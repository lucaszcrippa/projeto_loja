<?php
require_once "../config/database.php";

$db = new Database();
$conn = $db->conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "INSERT INTO clientes (nome, email) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$nome, $email]);

header("Location: ../index.php");