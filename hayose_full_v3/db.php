<?php
$host = "localhost";
$user = "root"; // cambiar en hosting
$pass = "";     // cambiar en hosting
$db   = "hayose_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Conexión fallida: " . $conn->connect_error); }
$conn->set_charset('utf8mb4');
?>