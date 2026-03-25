<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../config/database.php";

if (!isset($_GET['id'])) {
    die("ID não recebido");
}

$id = $_GET['id'];

$db = new Database();
$conn = $db->conectar();

$sql = "DELETE FROM clientes WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: ../index.php");
exit;