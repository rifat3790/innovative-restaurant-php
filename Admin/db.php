<?php
$servername = "localhost"; 
$username = "root";
$password = "RiFa123#"; 
$dbname = "innovative_solution";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>