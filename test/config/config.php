<?php
$servername ="localhost";
$username ="root";
$password ="";
$db_name ="smss";

$conn = new mysqli($servername, $username, $password, $db_name);

if (!$conn){
	die("connection error");
}
?>
