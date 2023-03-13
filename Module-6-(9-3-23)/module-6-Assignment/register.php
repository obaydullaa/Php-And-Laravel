<?php
// Validate form inputs
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
  }
} else {
  die("All fields are required");
}

// Save profile picture
if (isset($_FILES['profile_picture'])) {
  $file_name = $_FILES['profile_picture']['name'];
  $file_tmp = $_FILES['profile_picture']['tmp_name'];
  $file_size = $_FILES['profile_picture']['size'];
  $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $extensions = array("jpeg", "jpg", "png");

  if (!in_array($file_ext, $extensions)) {
    die("File type not allowed, please choose a JPEG, JPG, or PNG file.");
  }

  $unique_file_name = md5(uniqid(rand(), true)) . '.' . $file_ext;
  $upload_path = "uploads/" . $unique_file_name;

  if (!move_uploaded_file($file_tmp, $upload_path)) {
    die("Failed to upload file");
  }
} else {
  die("Profile picture is required");
}

// Add date and time to filename
$timestamp = time();
$datetime = date("YmdHis", $timestamp);
$file_parts = pathinfo($unique_file_name);
$updated_file_name = $file_parts['filename'] . '_' . $datetime . '.' . $file_parts['extension'];
$updated_upload_path = "uploads/" . $updated_file_name;
rename($upload_path, $updated_upload_path);

// Save user data to CSV file
$user_data = array($name, $email, $updated_file_name);
$file = fopen('users.csv', 'a');
fputcsv($file, $user_data);
fclose($file);

// Start session and set cookie
session_start();
$_SESSION['name'] = $name;
setcookie('user', $name, time()+3600); // cookie lasts for 1 hour

// Redirect to success page
header("Location: success.php");
exit;
?>
