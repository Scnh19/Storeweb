<?php

$sname= "db";
$unmae= "root";
$password = "password";
$db_name = "storeweb";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}