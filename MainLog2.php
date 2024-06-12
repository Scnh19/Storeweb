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

	if (empty($email)) {
		header("Location: index.php?error=email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		$hashword =  $row['password'];

		if (password_verify($_POST['password'],$hashword)) {
            if ($row['email'] === $email && $row['password'] === $pass) {
				$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
				header("Location: HomePage2.php");
                exit();
				
            }else{
				header("Location: index.php?error=Incorect email or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect email or password");
	        exit();
		}
	}
	
}
else{
	header("Location: index.php");
	exit();
}
?>