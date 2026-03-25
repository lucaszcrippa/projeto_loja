<?php
require_once "../config/database.php";

$db = new Database();
$conn = $db->conectar();

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "UPDATE clientes SET nome=?, email=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$nome, $email, $id]);

header("Location: ../index.php");