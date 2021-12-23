<?php
session_start();
$servername = 'localhost';
$dbname = 'ecommerce';
$username = 'root';
$password = '';
$conn = mysqli_connect($servername, $username, $password, $dbname); 
// Check connection
if (!$conn) {
	die("Connection failed: " . $conn->connect_error);
}
?>
