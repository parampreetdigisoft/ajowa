<?php
$host = "127.0.0.1";   // IMPORTANT (Docker port mapping)
$user = "ajowa_user";
$pass = "StrongPassword123!";
$db   = "ajowa_db";
$port = 3307;          // because docker exposes MySQL on 3307

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
