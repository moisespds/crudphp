<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM pedidos WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$pedido = $stmt->get_result()->fetch_assoc();

if (!$pedido) {
    die("Pedido não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $_POST['nome'];
    $preco = $_POST['preco'];

    $stmt2 = $conn->prepare("UPDATE pedidos SET nome=?, preco=? WHERE id=?");
    $stmt2->bind_param("sdi", $nome, $preco, $id);

    if ($stmt2->execute()) {
        header("Location: index.php");
        exit;
    }
}

include 'header.php';
?>

<h2 class="text-warning mb-3">Editar Pedido</h2>

<div class="card shadow">
    <div class="card-body">

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control"
                       value="<?= $pedido['nome']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control"
                       value="<?= $pedido['preco']; ?>" required>
            </div>

            <button class="btn btn-warning">Salvar alterações</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
</div>

<?php include 'footer.php'; ?>
