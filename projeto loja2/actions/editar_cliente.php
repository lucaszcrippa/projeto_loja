<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../config/database.php";

// Verifica se recebeu ID
if (!isset($_GET['id'])) {
    die("ID não informado");
}

$id = $_GET['id'];

// Conexão
$db = new Database();
$conn = $db->conectar();

// Buscar cliente
$sql = "SELECT * FROM clientes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

// Se não encontrar
if (!$cliente) {
    die("Cliente não encontrado");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/editar.css">
</head>
<body>

<div class="edit-container">
    <h1>Editar Cliente</h1>

    <form method="POST" action="atualizar_cliente.php">

        <!-- ID escondido -->
        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

        <input 
            type="text" 
            name="nome" 
            value="<?= $cliente['nome'] ?>" 
            placeholder="Nome"
            required
        >

        <input 
            type="email" 
            name="email" 
            value="<?= $cliente['email'] ?>" 
            placeholder="Email"
            required
        >

        <button type="submit">Atualizar</button>
    </form>

    <a href="../index.php" class="voltar">Voltar</a>
</div>

</body>
</html>