<?php
require 'function.php';

if(!empty($_SESSION["id"])){
  header("Location: homepage.php");
}

$register = new Register();

if(isset($_POST["submit"])){
  $result = $register->registration($_POST["fullname"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

  if($result == 1){
    echo
    "<script> alert('Registration Successful'); </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Password Does Not Match'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
  </head>
  <body>
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <input type="text" name="fullname" required value="" placeholder="Fullname : "> <br>

      <input type="text" name="username" required value="" placeholder="Username : "> <br>
      
      <input type="email" name="email" required value="" placeholder="Email : "> <br>

      <input type="password" name="password" required value="" placeholder="Password : "> <br>
      
      <input type="password" name="confirmpassword" required value="" placeholder="Confirm Password : "> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br> <br>
    <a href="login.php">Login</a>
  </body>
</html>