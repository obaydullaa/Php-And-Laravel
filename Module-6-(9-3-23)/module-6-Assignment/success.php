<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
</head>
<body>
    <?php
    // Start a session and get the user's name from the cookie
    session_start();
    $username = $_COOKIE['username'];

    // Check if the user is logged in, redirect to login page if not
    // if(empty($username)) {
    //     header("Location: login.php");
    //     exit();
    // }

    // Read the contents of the users.csv file
    $usersFile = fopen("users.csv", "r");
    $usersData = array();
    while (($data = fgetcsv($usersFile)) !== false) {
        $usersData[] = $data;
    }
    fclose($usersFile);
    ?>

    <h2>Users List</h2>
    <table border='1'>
        <tr><th>Name</th><th>Email</th><th>Profile Picture</th></tr>
        <?php foreach ($usersData as $user): ?>
            <tr>
                <td><?php echo $user[0]; ?></td>
                <td><?php echo $user[1]; ?></td>
                <td><img src='uploads/<?php echo $user[2]; ?>' width='50' height='50'></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br><br>

</body>
</html>
