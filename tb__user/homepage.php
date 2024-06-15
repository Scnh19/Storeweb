<?php
require 'function.php';

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <title>HomePage</title>
  </head>
  <body><?php
require_once "function.php";

   $sql = "SELECT id, sku, productname, price, stocks FROM product";

if ($sql->num_rows > 0) {
     //always change the double quote to single if inside the echo(php)
     echo "<div class='container'>
     <table class='table table-striped'>
     <tr><th> ID </th>
     <th> sku </th>
     <th> ProductName </th>
     <th> ProductPrice </th>
     <th> ProductStocks </th>
     <th> AddedBy </th></tr>";

     // output data of each row
     while($row = $sql->fetch_assoc()) {
          echo "<tr><td>" . $row["id"]. 
          "</td><td>" . $row["sku"]. 
          "</td><td>" . $row["productname"]. 
          "</td><td>" . $row["price"]. 
          "</td><td>" . $row["stocks"]. 
          "</td><td>" . $row["addedby"]. "</td></tr>";
        }
     echo "</table>";
   } else {
     echo "No Product.";
   }

?>
    <h1>Welcome <?php echo $user["username"]; ?></h1>
    <a href="logout.php">Logout</a>
    <br>
    <a href="product.php">Add List?</a>
  </body>
</html>