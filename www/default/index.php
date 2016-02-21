<?php
$servername = "mysql"; //can't use localhost. Must use mysql is a mysql name docker-compose.yml
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>