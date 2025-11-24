<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $_POST['nome'];
    $preco = $_POST['preco'];

    $stmt = $conn->prepare("INSERT INTO pedidos (nome, preco) VALUES (?, ?)");
    $stmt->bind_param("sd", $nome, $preco);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    }
}

include 'header.php';
?>

<h2 class="text-success mb-3">Novo Pedido</h2>

<div class="card shadow">
    <div class="card-body">

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" required>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
</div>

<?php include 'footer.php'; ?>
