<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
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
		<label>Email:</label>
		<input type="text" name="email">
		<span><?php echo $email_err;?></span><br><br>
		
		<label>Password:</label>
		<input type="password" name="password">
		<span><?php echo $password_err;?></span><br><br>
		
		<input type="submit" name="submit" value="Login">
	</form>
	<?php
		if (!empty($login_err)) {
			echo "<p>$login_err</p>";
		}
	?>
</body>
</html>
