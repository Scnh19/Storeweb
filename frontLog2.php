<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
     <form action="MainLog2.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>

     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="productname" placeholder="Product Name"><br>

     	<label>User Name</label>
     	<input type="password" name="modifiedby" placeholder="Modifier"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>