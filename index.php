<?php
include 'db.php';

$result = $conn->query("SELECT * FROM pedidos_po ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos</title>
</head>
<body>

<h1>Pedidos</h1>
<a href="create.php">Criar novo pedido</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Criado em</th>
        <th>Ações</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nome']; ?></td>
            <td>R$ <?= number_format($row['preco'], 2, ',', '.'); ?></td>
            <td><?= $row['criado_em']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Editar</a> |
                <a href="delete.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Deseja excluir?')">Excluir</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
