<?php 

//database connect

$host = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
global $conn;

const GOOGLE_Client_ID = "";
const GOOGLE_Client_SERECT = "";
const GOOGLE_REDIRECT_URI= "";


?>
