<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<h2>Registration Form</h2>
	<?php
		// define variables and set to empty values
		$first_name = $last_name = $email = $password = $confirm_password = "";
		$first_name_err = $last_name_err = $email_err = $password_err = $confirm_password_err = "";
		
		// check if form is submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// validate first name
			if (empty($_POST["first_name"])) {
				$first_name_err = "First name is required";
			} else {
				$first_name = test_input($_POST["first_name"]);
			}
			
			// validate last name
			if (empty($_POST["last_name"])) {
				$last_name_err = "Last name is required";
			} else {
				$last_name = test_input($_POST["last_name"]);
			}
			
			// validate email
			if (empty($_POST["email"])) {
				$email_err = "Email is required";
			} else {
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$email_err = "Invalid email format";
				}
			}
			
			// validate password
			if (empty($_POST["password"])) {
				$password_err = "Password is required";
			} else {
				$password = test_input($_POST["password"]);
			}
			
			// validate confirm password
			if (empty($_POST["confirm_password"])) {
				$confirm_password_err = "Confirm password is required";
			} else {
				$confirm_password = test_input($_POST["confirm_password"]);
				if ($confirm_password != $password) {
					$confirm_password_err = "Passwords do not match";
				}
			}
			
			// check if there are no errors
			if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
				// save user data to csv file
				$data = array($first_name, $last_name, $email, $password);
				$file = fopen('users.csv', 'a');
				fputcsv($file, $data);
				fclose($file);
				// display confirmation message
				echo "<p>Thank you for registering, $first_name!</p>";
				exit();
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
		<label>First Name:</label>
		<input type="text" name="first_name" value="<?php echo $first_name;?>">
		<span><?php echo $first_name_err;?></span><br><br>
		
		<label>Last Name:</label>
		<input type="text" name="last_name" value="<?php echo $last_name;?>">
		<span><?php echo $last_name_err;?></span><br><br>
		
		<label>Email:</label>
    <input type="text" name="email" value="<?php echo $email;?>">
		<span><?php echo $email_err;?></span><br><br>
    <label>Password:</label>
	<input type="password" name="password" value="<?php echo $password;?>">
	<span><?php echo $password_err;?></span><br><br>
	
	<label>Confirm Password:</label>
	<input type="password" name="confirm_password" value="<?php echo $confirm_password;?>">
	<span><?php echo $confirm_password_err;?></span><br><br>
	
	<input type="submit" name="submit" value="Register">
</form>

</body>
</html>
