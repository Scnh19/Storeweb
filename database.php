<?php
$servername = "localhost";
$username = "perry";
$dbPassword = "4*!_AZ9phfN5Q@U]"; //diff name if tatawagin sa ibang file iwas same name
$dbname = "storeweb";
$conn = mysqli_connect($servername, $username, $dbPassword, $dbname);
if(!$conn) {
    die("Something went wrong;");
}
?>