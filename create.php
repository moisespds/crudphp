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
    } else {
        echo "Erro ao inserir.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Criar Pedido</title>
</head>
<body>

<h1>Novo Pedido</h1>

<form method="POST">
    Nome: <br>
    <input type="text" name="nome" required><br><br>

    Preço: <br>
    <input type="number" step="0.01" name="preco" required><br><br>

    <button type="submit">Salvar</button>
</form>

</body>
</html>
