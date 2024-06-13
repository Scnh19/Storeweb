<?php 
session_start();
if (isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class = "local">
     <?php
require_once "DataBase2.php";
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   
   $sql = "SELECT id, sku, productname, price, stocks, addedby FROM productlist";
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
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
     while($row = $result->fetch_assoc()) {
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
</div>
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