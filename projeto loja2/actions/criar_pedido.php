<?php
require_once "../config/database.php";

$db = new Database();
$conn = $db->conectar();

$cliente_id = $_POST['cliente_id'];

$stmt = $conn->prepare("INSERT INTO pedidos (cliente_id) VALUES (?)");
$stmt->execute([$cliente_id]);

$pedido_id = $conn->lastInsertId();

header("Location: ../pedido.php?id=" . $pedido_id);