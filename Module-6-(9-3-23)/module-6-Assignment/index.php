<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="reg-wrapper">
      <h1>Registration Form</h1>
      <form action="register.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture" required><br>

        <input class="btn" type="submit" value="Submit">
      </form>
    </div>

  </body>
</html>


