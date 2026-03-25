<?php
require_once "../config/database.php";

$db = new Database();
$conn = $db->conectar();

$pedido_id = $_POST['pedido_id'];
$produto_id = $_POST['produto_id'];
$qtd = $_POST['quantidade'];

$sql = "INSERT INTO pedido_itens (pedido_id, produto_id, quantidade)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->execute([$pedido_id, $produto_id, $qtd]);

header("Location: ../pedido.php?id=" . $pedido_id);