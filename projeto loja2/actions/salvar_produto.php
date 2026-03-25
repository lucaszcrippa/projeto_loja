<?php
require_once "../config/database.php";

$db = new Database();
$conn = $db->conectar();

$nome = $_POST['nome'];
$preco = $_POST['preco'];

$stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
$stmt->execute([$nome, $preco]);

header("Location: ../index.php");