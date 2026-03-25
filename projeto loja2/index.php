<?php
require_once "config/database.php";

$db = new Database();
$conn = $db->conectar();

// Buscar clientes
$clientes = $conn->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);

// Buscar produtos
$produtos = $conn->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema de Loja</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h1>🛒 Sistema de Loja</h1>

<!-- ================= CLIENTE ================= -->
<h2>👤 Cadastrar Cliente</h2>
<form method="POST" action="actions/salvar_cliente.php">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Cadastrar</button>
</form>

<!-- ================= PRODUTO ================= -->
<h2>📦 Cadastrar Produto</h2>
<form method="POST" action="actions/salvar_produto.php">
    <input type="text" name="nome" placeholder="Produto" required>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required>
    <button type="submit">Cadastrar</button>
</form>

<!-- ================= LISTA CLIENTES ================= -->
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>📋 Lista de Clientes</h2>
    <a href="index.php" class="btn-refresh">🔄 Atualizar</a>
</div>

<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Ações</th>
</tr>

<?php foreach ($clientes as $c): ?>
<tr>
    <td><?= $c['id'] ?></td>
    <td><?= $c['nome'] ?></td>
    <td><?= $c['email'] ?></td>
    <td class="acoes">
        <a href="actions/editar_cliente.php?id=<?= $c['id'] ?>">Editar</a>

        <a href="actions/excluir_cliente.php?id=<?= $c['id'] ?>"
           onclick="return confirm('Tem certeza que deseja excluir?')">
           Excluir
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<!-- ================= LISTA PRODUTOS ================= -->
<h2>📦 Lista de Produtos</h2>

<table>
<tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Preço</th>
</tr>

<?php foreach ($produtos as $p): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['nome'] ?></td>
    <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
</tr>
<?php endforeach; ?>

</table>

<!-- ================= CRIAR PEDIDO ================= -->
<h2>🧾 Criar Pedido</h2>

<form method="POST" action="actions/criar_pedido.php">
    <select name="cliente_id" required>
        <option value="">Selecione um cliente</option>
        <?php foreach ($clientes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Criar Pedido</button>
</form>

</div>

</body>
</html>