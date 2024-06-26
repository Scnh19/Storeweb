<?php
session_start();
if (isset($_SESSION["user_name"]) && isset($_SESSION["full_name"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $uname = $_POST["user_name"];
           $fullname = $_POST["full_name"];
           $email = $_POST["email"];
           $pass = $_POST["password"];
           $passRepeat = $_POST["repeat_password"];


           $passHash = password_hash($pass, PASSWORD_DEFAULT);
           
           $errors = array();

           if (empty($uname) OR empty($fullname) OR empty($email) OR empty($pass) OR empty($passRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($uname)) {
            array_push($errors, "Username is not valid");
           }
           if (!filter_var($fullname)) {
            array_push($errors, "Fullname is not valid");
           }
           if (!filter_var($email)) {
            array_push($errors, "Email is not valid");
           }
           if (!filter_var($pass)) {
            array_push($errors, "Password is not valid");
           }

           if ($pass!==$passRepeat) {
            array_push($errors,"Password does not match");
           }

           require_once "DataBase2.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"User already exists.");
           }
           if (count($errors)>0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            $sql = "INSERT INTO users (user_name, full_name, email, password) VALUES ( ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, 'ssss', $uname, $fullname, $email, $passHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You have registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
        }
        ?>
        <form action="Registration2.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="user_name" placeholder="UserName:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="FullName:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Review The list?<a href="index.php">Log in</a></p></div>
      </div>
    </div>
</body>
</html>