<?php 
session_start();

if (isset($_SESSION['productname']) && isset($_SESSION['modifiedby'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['modifiedby']; ?></h1>
     
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: frontLog2.php");
     exit();
}
 ?>