<?php
	session_start();
	if (!isset($_SESSION["first_name"])) {
		header("Location: login.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="box-wrapper">
		<h2>Welcome, <?php echo $_SESSION["first_name"]; ?>!</h2>
		<p>You have successfully logged in.</p>
		<a href="index.php" class="btn">Registration</a>
	</div>
</body>
</html>
