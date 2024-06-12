<?php 
session_start(); 
include "DataBase2.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email) || empty($pass) ) {
		header("Location: index.php?error=email and password is required");
	    exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) === 1) {
			if (mysqli_num_rows($result) === 1) {
			if (password_verify($_POST['password'],$row['password'])) {
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['id'] = $row['id'];
					header("Location: HomePage2.php");
					exit();
			}
			else{ header("Location: index.php?error=email or password is wrong");}
			}
		}
		else{ header("Location: index.php?error=email or password is wrong");}
	}
	
}

?>