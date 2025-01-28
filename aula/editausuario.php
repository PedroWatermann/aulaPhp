<?php

include "conecta.php";

$id = $_GET["id"];
$nome = $_POST["nome"];
$genero = $_POST["genero"];
$cpf = $_POST["cpf"];
$tipo = $_GET["tipo"];

$sql = "UPDATE usuario SET nome = ?, genero = ?, cpf = ?, tipo = ? WHERE id = ?";

$stmt = $mysqli->prepare($sql) or die($mysqli->error);
if (!$stmt) {
    echo "Erro na atualização: $mysqli->errno - $mysqli->error";
} else {
    $stmt->bind_param("ssssi", $nome, $genero, $cpf, $tipo, $id);
    $stmt->execute();

    echo "
        <script>
            alert('Usuário editado com sucesso!');
        </script>
    ";
}

$mysqli->close();

header("Location: usuario.php");