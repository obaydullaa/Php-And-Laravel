
HTML Form
<!DOCTYPE html>
<html>
  <head>
    <title>Form Submission</title>
  </head>
  <body>
    <h1>User Registration Form</h1>
    <form action="submit.php" method="post" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br><br>
      <label for="profile_picture">Profile Picture:</label>
      <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
      <br><br>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
<!-- PHP Script -->
<?php
// Validate form inputs
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_FILES['profile_picture'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $profile_picture = $_FILES['profile_picture'];

  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format!";
    exit();
  }

  // Save profile picture to server
  $uploads_dir = 'uploads/';
  $file_name = uniqid() . '_' . $profile_picture['name'];
  $file_path = $uploads_dir . $file_name;

  if (move_uploaded_file($profile_picture['tmp_name'], $file_path)) {
    echo "Profile picture uploaded successfully!";
  } else {
    echo "Failed to upload profile picture!";
    exit();
  }

  // Save user data to CSV file
  $user_data = array($name, $email, $file_name);
  $fp = fopen('users.csv', 'a');
  fputcsv($fp, $user_data);
  fclose($fp);

  // Start new session and set cookie
  session_start();
  setcookie('user_name', $name, time() + 3600, '/');
} else {
  echo "All fields are required!";
  exit();
}
?>