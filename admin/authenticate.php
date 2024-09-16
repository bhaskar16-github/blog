<?php
$environment = 'development';

$host = "localhost";
$user = "root";
$pass = "";
$db = "login";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    if ($environment == 'development') {
        die("Connection failed: " . $conn->connect_error); 
    } else {
        error_log("Connection failed: " . $conn->connect_error, 3, "error_log.txt");
        echo "Failed to connect to the database. Please try again later.";
    }
    exit();
}

echo "Successfully connected to the Users DB.";
?>
