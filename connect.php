<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "cms"; 

$Conn = new mysqli($host, $user, $pass, $db);

if ($Conn->connect_error) {
    die("Failed to connect to Posts DB: " . $Conn->connect_error);
}
?>


