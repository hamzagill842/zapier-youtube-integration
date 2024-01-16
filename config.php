<?php 

//database connect

$host = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
global $conn;



?>
