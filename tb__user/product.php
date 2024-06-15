<?php
require 'function.php';

$product = new Product();

if(isset($_POST["submit"])){
  $result = $product->Product($_POST["sku"], $_POST["productname"], $_POST["price"], $_POST["stocks"]);

  if($result == 1){
    echo
    "<script> alert('Product Registration Successful'); </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('SKU or Product Has Already Taken'); </script>";
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
    <title>Product Registration</title>
  </head>
  <body>
    <h2>Product Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <input type="text" name="sku" required value="" placeholder="sku : "> <br>

      <input type="text" name="productname" required value="" placeholder="productname : "> <br>
      
      <input type="text" name="price" required value="" placeholder="Price : "> <br>

      <input type="text" name="stocks" required value="" placeholder="Stocks : "> <br>
      <input type="hidden" disabled class="form-control" name="username" value= '$username'>
      <button type="submit" name="submit">Register Product</button>
    </form>
    <br> <br>
    <a href="homepage.php">Return HomePage</a>
  </body>
</html>