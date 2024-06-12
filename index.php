<?php
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
}
?>
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
     	<label>Email</label>
     	<input type="text" name="email" placeholder="Email"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>
     	<button type="submit">Login</button>
		<div><p>Dont have account?<a href="Registration2.php">Register</a></p></div>
     </form>
</body>
</html>