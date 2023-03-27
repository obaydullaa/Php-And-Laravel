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
</head>
<body>
	<h2>Welcome, <?php echo $_SESSION["first_name"]; ?>!</h2>
	<p>You have successfully logged in.</p>
</body>
</html>
