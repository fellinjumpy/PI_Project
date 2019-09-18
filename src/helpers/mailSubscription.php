<?php 
include("db.php");

 

$sql = "INSERT INTO mail_list (mail) 
        VALUES ('{$_POST['email']}')";

if ($conn->query($sql) === TRUE) {
    consoleLog("New record created successfully");
    
} else {
    consoleLog("Error: " . $sql . "<br>" . $conn->error);
}
 
$conn->close();

 
consoleLog("Connection Closed");
?>