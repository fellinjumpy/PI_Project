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

$sql = "SELECT * FROM info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
    }
} else {
   consoleLog(" 0 results");
}


?>