<?php

include "conecta.php";

$id = $_GET["id"];
$descricao = $_POST["descricao"];
$unidade = $_POST["unidade"];
$quantidade = $_POST["quantidade"];

$sql = "UPDATE produto SET descricao = ?, unidade = ?, quantidade = ? WHERE id = ?";

$stmt = $mysqli->prepare($sql) or die($mysqli->error);
if (!$stmt) {
    echo "Erro na atualização: $mysqli->errno - $mysqli->error";
} else {
    $stmt->bind_param("ssii", $descricao, $unidade, $quantidade, $id);
    $stmt->execute();

    echo "
        <script>
            alert('Produto editado com sucesso!');
        </script>
    ";
}

$mysqli->close();

header("Location: produto.php");