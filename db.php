<?php
//server details
$servername = "sql312.epizy.com";
$username = "epiz_21785510";
$password = "chandan123";
$dbname = "epiz_21785510_copilot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// localhost details
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "copilot";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}