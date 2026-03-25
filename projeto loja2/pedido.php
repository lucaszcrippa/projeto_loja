<?php
require_once "config/database.php";

$db = new Database();
$conn = $db->conectar();

$pedido_id = $_GET['id'];

// Cliente
$sql = "SELECT c.* FROM pedidos p
        JOIN clientes c ON c.id = p.cliente_id
        WHERE p.id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$pedido_id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

// Produtos do pedido
$sql = "SELECT pr.nome, pr.preco, pi.quantidade
        FROM pedido_itens pi
        JOIN produtos pr ON pr.id = pi.produto_id
        WHERE pi.pedido_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$pedido_id]);
$itens = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Total
$total = 0;
foreach ($itens as $item) {
    $total += $item['preco'] * $item['quantidade'];
}

// Lista de produtos (para adicionar)
$produtos = $conn->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">

<h1>🛒 Pedido #<?= $pedido_id ?></h1>

<h2>👤 Cliente</h2>
<p><?= $cliente['nome'] ?> (<?= $cliente['email'] ?>)</p>

<h2>📦 Produtos</h2>

<table>
<tr>
<th>Produto</th>
<th>Preço</th>
<th>Qtd</th>
<th>Subtotal</th>
</tr>

<?php foreach ($itens as $item): ?>
<tr>
<td><?= $item['nome'] ?></td>
<td>R$ <?= $item['preco'] ?></td>
<td><?= $item['quantidade'] ?></td>
<td>R$ <?= $item['preco'] * $item['quantidade'] ?></td>
</tr>
<?php endforeach; ?>

</table>

<h2>💰 Total: R$ <?= $total ?></h2>

<hr>

<h2>➕ Adicionar Produto</h2>

<form method="POST" action="actions/adicionar_item.php">
    <input type="hidden" name="pedido_id" value="<?= $pedido_id ?>">

    <select name="produto_id">
        <?php foreach ($produtos as $p): ?>
            <option value="<?= $p['id'] ?>"><?= $p['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="number" name="quantidade" value="1" min="1">

    <button>Adicionar</button>
</form>

</div>