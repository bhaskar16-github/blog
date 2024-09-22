<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "cms"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Failed to connect to Posts DB: " . $conn->connect_error);
}
?>


