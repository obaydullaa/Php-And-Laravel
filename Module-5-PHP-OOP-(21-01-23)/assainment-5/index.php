<!DOCTYPE html>
<html>
  <head>
    <title>My Form</title>
  </head>
  <body>

<?php
      //  global Variables in PHP
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
      
        $person = new Person();
        $person->setName($name);
        $person->setEmail($email);
      
        // echo "Name: " . $person->getName() . "<br>";
        // echo "Email: " . $person->getEmail() . "<br>";
      }

?>

    <div class="form-wrapper">

        <h2>Assignment Module-5</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="single-input">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="single-input">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <input class="btn" type="submit" value="Submit">
        </form>

        <div class="output-wrapper">
            <h3><?php echo "Name: " . $person->getName() . "<br>"; ?></h3>
            <h3><?php echo "Email: " . $person->getEmail() . "<br>"; ?></h3>
        </div>

    </div>
    
    <?php
      //OOP in PHP
      
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
      
    ?>
    <style>
        .form-wrapper {
        width: 400px;
        margin: 100px auto;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        padding: 40px;
        box-sizing: border-box;
        }
        .form-wrapper h2 {
            margin: 0;
            font-size: 30px;
            margin-bottom: 30px;
        }
        .single-input label {
        display: block;
        margin-bottom: 8px;
        font-size: 18px;
        font-weight: bolder;
        }
        .single-input {
        margin-bottom: 15px;
        }
        .single-input input {
        padding: 10px 30px;
        width: 83%;
        border: 1px solid #ddd;
        outline: 0;
        }
        .single-input input:focus {
        border: 1px solid #a49d9d;
        }
        .btn {
        padding: 10px 34px;
        font-size: 18px;
        font-weight: 500;
        outline: 0;
        border: 0;
        cursor: pointer;
        transition: all .4s;
        }
        .btn:hover {
        background: #918383;
        }
        .output-wrapper {
        margin-top: 28px;
        }
        .output-wrapper h3 {
        margin: 6px;
        }
      
    </style>
  </body>
</html>
