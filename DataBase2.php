<?php

$sname= "localhost";
$unmae= "perry";
$password = "4*!_AZ9phfN5Q@U]";
$db_name = "storeweb";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}