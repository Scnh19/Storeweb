<?php 
session_start();
if (isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
     <?php
require_once "DataBase2.php";
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   
   $sql = "SELECT id, sku, productname, price, stocks, addedby FROM productlist";
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table>
     <tr><th>ID</th><th>sku</th><th> ProductName </th><th> ProductPrice</th><th> ProductStocks</th><th> AddedBy</th><th>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id"]. "</td><td>" . $row["sku"]. "</td><td>" . $row["productname"]. "</td><td>" . $row["price"]. "</td><td>" . $row["stocks"]. "</td><td>" . $row["addedby"]. "</td></tr>";
        }
     echo "</table>";
   } else {
     echo "No Product.";
   }

?>
     <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
     <a href="logout.php">Logout</a>
     <a href="preg.php">Add List</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>