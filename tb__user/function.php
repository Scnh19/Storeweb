<?php
session_start();

class Connection{
  public $sname = "db";
  public $uname = "root";
  public $password = "password";
  public $db_name = "oop_reglog";
  public $conn;
  public function __construct(){
    $this->conn = mysqli_connect ($this->sname, $this->uname, $this->password, $this->db_name);
  }
}

class Register extends Connection{
  public function registration($fullname, $username, $email, $password, $confirmpassword){
    $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      // Username or email has already taken
    }
    else{
      if($password == $confirmpassword){
        $query = "INSERT INTO user VALUES(0, '$fullname', '$username', '$email', '$password', NOW(), NOW())";
        mysqli_query($this->conn, $query);
        return 1;
        // Registration successful
      }
      else{
        return 100;
        // Password does not match
      }
    }
  }
}

class Product extends Connection{
  public function product($sku, $productname, $price, $stocks){
    $duplicate = mysqli_query($this->conn, "SELECT * FROM product WHERE sku = '$sku' OR productname = '$productname'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      // Username or email has already taken
    }
    else{
      if($productname){
        $query = "INSERT INTO product VALUES(0, '$sku', '$productname', '$price', '$stocks', 'username', NOW(), NOW())";
        mysqli_query($this->conn, $query);
        return 1;
        // Registration successful
      }
      else{
        return 100;
        // Password does not match
      }
    }
  }
}

class Login extends Connection{
  public $id;
  public function login($usernameemail, $password){
    $result = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $this->id = $row["id"];
        return 1;
        // Login successful
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
    }
  }

  public function idUser(){
    return $this->id;
  }
}

class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM user WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}