<!DOCTYPE html>
<html>
  <head>
    <title>My Form</title>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email"><br><br>
      <input type="submit" value="Submit">
    </form>
    
    <?php
      // Task 2: Basic OOP in PHP
      
      class Person {
        private $name;
        private $email;
      
        public function setName($name) {
          $this->name = $name;
        }
      
        public function setEmail($email) {
          $this->email = $email;
        }
      
        public function getName() {
          return $this->name;
        }
      
        public function getEmail() {
          return $this->email;
        }
      }
      
      // Task 3: Superglobal Variables in PHP
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
      
        $person = new Person();
        $person->setName($name);
        $person->setEmail($email);
      
        echo "Name: " . $person->getName() . "<br>";
        echo "Email: " . $person->getEmail() . "<br>";
      }
    ?>
  </body>
</html>
