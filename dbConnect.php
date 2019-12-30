





<?php
$servername = "chnandinich70848.ipagemysql.com";
$username = "myretaildesign";
$password = "myretaildesign";
$dbname = "myretaildesign";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
 echo "Connected successfully";
?>