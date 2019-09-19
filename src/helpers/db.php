<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "band_db";
require 'console.php';
$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection Failed " . $conn->connect_error);
    consoleLog("Connection Failed.");
}

consoleLog("connected");

 


?>