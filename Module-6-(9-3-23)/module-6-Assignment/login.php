// login.php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Validate the user's credentials
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if($username == 'admin' && $password == 'password') {
    // Set the session variable and redirect to success.php
    $_SESSION['username'] = $username;
    header('Location: success.php');
    exit();
  } else {
    // Invalid credentials, display error message
    $error = 'Invalid username or password';
  }
}
?>

<html>
<head>
  <title>Login</title>
</head>
<body>
  <?php if(isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  
  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Login">
  </form>
</body>
</html>