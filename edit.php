<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];

// Buscar pedido
$stmt = $conn->prepare("SELECT * FROM pedidos WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$pedido = $stmt->get_result()->fetch_assoc();

if (!$pedido) {
    die("Pedido não encontrado.");
}

// Atualizar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $_POST['nome'];
    $preco = $_POST['preco'];

    $stmt2 = $conn->prepare("UPDATE pedidos SET nome=?, preco=? WHERE id=?");
    $stmt2->bind_param("sdi", $nome, $preco, $id);

    if ($stmt2->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Pedido</title>
</head>
<body>

<h1>Editar Pedido #<?= $pedido['id']; ?></h1>

<form method="POST">
    Nome: <br>
    <input type="text" name="nome" value="<?= $pedido['nome']; ?>" required><br><br>

    Preço: <br>
    <input type="number" step="0.01" name="preco" value="<?= $pedido['preco']; ?>" required><br><br>

    <button type="submit">Salvar alterações</button>
</form>

</body>
</html>
