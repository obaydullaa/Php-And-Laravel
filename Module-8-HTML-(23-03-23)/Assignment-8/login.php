
<?php 
  // require_once("index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="box-wrapper">
  <h2>Login Form</h2>
	<?php
 
		// check if form is submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// validate email
			if (empty($_POST["email"])) {
				$email_err = "Email is required";
			} else {
				$email = test_input($_POST["email"]);
			}
			
			// validate password
			if (empty($_POST["password"])) {
				$password_err = "Password is required";
			} else {
				$password = test_input($_POST["password"]);
			}
			
			// check if there are no errors
			if (empty($email_err) && empty($password_err)) {
				// read user data from csv file
				$file = fopen('users.csv', 'r');
				while (($data = fgetcsv($file)) !== FALSE) {
					if ($data[2] == $email && $data[3] == $password) {
						// set session variable and redirect to welcome page
						session_start();
						$_SESSION["first_name"] = $data[0];
						header("Location: welcome.php");
						exit();
					}
				}
				// if login credentials are invalid, display error message
				$login_err = "Invalid email or password";
				fclose($file);
			}
		}
		
		// function to sanitize input data
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="sing-input">
      <label>Email:</label>
      <input type="text" name="email">
      <span>
        <?php  if(isset($email_err) ){ echo $email_err;} ?>
      </span>
  </div>
  <div class="sing-input">
		<label>Password:</label>
		<input type="password" name="password">
		<span>
      <?php  if(isset($password_err) ){ echo $email_err;} ?>
    </span>
  </div>
		
		
		<input class="btn" type="submit" name="submit" value="Login">
	</form>
	<?php
		if (!empty($login_err)) {
			echo "<p style='color: red;'>$login_err</p>";
		}
	?>
  </div>

</body>
</html>
