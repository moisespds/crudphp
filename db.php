<?php
$host = "pradooridesdatabase.ca7nqjxtepzb.us-east-1.rds.amazonaws.com";
$user = "admin";
$pass = "fatec2025";
$db   = "pedidos_po";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
