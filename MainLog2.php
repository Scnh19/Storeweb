<?php 
session_start(); 
include "DataBase2.php";

if (isset($_POST['productname']) && isset($_POST['modifiedby'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$productname = validate($_POST['productname']);
	$modifiedby = validate($_POST['modifiedby']);

	if (empty($productname)) {
		header("Location: frontLog2.php?error=User Name is required");
	    exit();
	}else if(empty($modifiedby)){
        header("Location: frontLog2.php?error=modifiedby is required");
	    exit();
	}else{
		$sql = "SELECT * FROM productlist WHERE productname='$productname' AND modifiedby='$modifiedby'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['productname'] === $productname && $row['modifiedby'] === $modifiedby) {
            	$_SESSION['productname'] = $row['productname'];
            	$_SESSION['modifiedby'] = $row['modifiedby'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: HomePage2.php");
		        exit();
				
            }else{
				header("Location: frontLog2.php?error=Incorect productname or modifier");
		        exit();
			}
		}
	}
	
}else{
	header("Location: frontLog2.php");
	exit();
}