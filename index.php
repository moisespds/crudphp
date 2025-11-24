<?php
include 'db.php';
include 'header.php';

$result = $conn->query("SELECT * FROM pedidos ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-primary">Lista de Pedidos</h2>
    <a href="create.php" class="btn btn-success">Novo Pedido</a>
</div>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nome']; ?></td>
                    <td>R$ <?= number_format($row['preco'], 2, ',', '.'); ?></td>
                    <td><?= $row['criado_em']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?= $row['id']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
