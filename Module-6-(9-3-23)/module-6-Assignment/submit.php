<!DOCTYPE html>
<html>
  <head>
    <title>Users Table</title>
  </head>
  <body>
    <h1>Users Table</h1>
    <table border="1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Profile Picture</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Read user data from CSV file and display in table
        if (($fp = fopen("users.csv", "r")) !== FALSE) {
          while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
            echo "<tr>";
            echo "<td>" . $data[0] . "</td>";
            echo "<td>" . $data[1] . "</td>";
            echo "<td><img src='uploads/" . $data[2] . "' height='100'></td>";
            echo "</tr>";
          }
          fclose($fp);
        }  
        ?>
      </tbody>
    </table>
  </body>
</html