<?php 
session_start();
if (isset($_SESSION['user_name'] )) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $sku = $_POST["sku"];
           $productname = $_POST["productname"];
           $price = $_POST["price"];
           $stocks = $_POST["stocks"];
           /*echo $sku;
           echo "<br>";
           echo $productname;
           echo "<br>";
           echo $price;
           echo "<br>";
           echo $dateadded;
           echo "<br>";
           echo $modifiedby;*/
           
           $errors = array();
           
           if (empty($sku) OR empty($productname) OR empty($price) OR empty($stocks)) {
            array_push($errors,"All fields are required");
           }/*
           if (!filter_var($sku)) {
            array_push($errors, "SKU is not valid");
           }
           if (!filter_var($productname)) {
            array_push($errors, "Product is not valid");
           }
           if (!filter_var($price)) {
            array_push($errors, "Price is not valid");
           }
           if (!filter_var($stocks)) {
            array_push($errors, "Stock is not valid");
           }
           /*if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }*/
           require_once "DataBase2.php";
           $sql = "SELECT * FROM productlist WHERE productname = '$productname'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);

           if ($rowCount>0) {
            array_push($errors,"Product already exists.");
           }
           if (count($errors)>0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            $sql1 = "INSERT INTO productlist (sku, productname, price, stocks, addedby) VALUES ( ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql1);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, 'issss', $sku, $productname, $price, $stocks, $_SESSION['user_name']);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>The Product is registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
        }
        ?>
        <form action="preg.php" method="post">
            <div class="form-group">
            <label for="">SKU</label>
                <input type="number" class="form-control" name="sku">
            </div>
            <div class="form-group">
            <label for="">Product Name</label>
                <input type="text" class="form-control" name="productname">
            </div>
            <div class="form-group">
            <label for="">Product Price</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="">Stocks</label>
                <input type="number" class="form-control" name="stocks">
            </div>
            <div class="form-group">
                <input type="hidden" disabled class="form-control" name="username" value=<?php echo $_SESSION['user_name']; ?>>
            </div>
            <div class="form-btn">
                <input type="submit" style="background-color: #1A7CEA;" class="btn btn-primary" value="Add To Product List" name="submit"> <br>
            </div>
        </form>
        <div>
        <div><p><a href="HomePage2.php">Back to HomePage</a></p></div>
      </div>
    </div>
    <?php 
    }else{
     header("Location: index.php");
     exit();
}
 ?>
</body>
</html>