<?php 
$host = 'localhost';
$db = 'user_data';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>