
<!DOCTYPE html>
<html>
  <head>
    <title>Registration and Login Form</title>
  </head>
  <body>
    <h1>Registration Form</h1>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define variables and set to empty values
        $firstName = $lastName = $email = $password = $confirmPassword = "";

        // Get form data and sanitize input
        $firstName = test_input($_POST["firstName"]);
        $lastName = test_input($_POST["lastName"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $confirmPassword = test_input($_POST["confirmPassword"]);

        // Validate form data
        $errors = [];
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
          $errors[] = "All fields are required.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors[] = "Invalid email format.";
        }
        if ($password !== $confirmPassword) {
          $errors[] = "Passwords do not match.";
        }

        // If there are no errors, display confirmation message
        if (count($errors) === 0) {
          echo "<p>Thank you for registering, $firstName!</p>";
        } else {
          // Display errors
          foreach ($errors as $error) {
            echo "<p>$error</p>";
          }
        }
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName" required><br>

      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" required><br>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required><br>

      <input type="submit" value="Register">
    </form>

    <hr>

    <h1>Login Form</h1>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define variables and set to empty values
        $email = $password = "";

        // Get form data and sanitize input
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);

        // Validate form data
        $errors = [];
        if (empty($email) || empty($password)) {
          $errors[] = "Both fields are required.";
        }

        // If there are no errors, redirect to welcome page
        if (count($errors) === 0) {
          // Check if email and password match the registered user
          // For simplicity, we will assume that there is only one registered user with the email and password provided
          $registeredEmail = "john@example.com";
          $registeredPassword = "password123";
        }


        if ($email === $registeredEmail && $password === $registeredPassword) {
            // Redirect to welcome page
            header("Location: welcome.php?firstName=John");
            exit();
          } else {
            // Display error message
            echo "<p>Invalid email or password. Please try again.</p>";
          }
        } else {
          // Display errors
          foreach ($errors as $error) {
            echo "<p>$error</p>";
          }
        }
    ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required><br>
    
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>
    
      <input type="submit" value="Login">
    </form>
    
