<?php
session_start();

include "conecta.php";

// Captura dos dados do formulário
$descricao = $_POST["descricao"];
$unidade = $_POST["unidade"];
$quantidade = $_POST["quantidade"];

// Utiliza o método query para executar a query e, caso seja bem sucedida, armazena os dados no objeto $query
$query = $mysqli->query("SELECT * FROM produto WHERE descricao = '$descricao'");
if ($query->num_rows > 0) {
    echo "
        <script>
            alert('Este produto já existe em nossa base de dados!');
            window.location.href = 'produto.php';
        </script>
    ";
    exit();
} else {
    $sql = "INSERT INTO produto(descricao, unidade, quantidade) VALUES ('$descricao', '$unidade', '$quantidade')";
    if (mysqli_query($mysqli, $sql)) {
        echo "
            <script>
                alert('Produto cadastrado com sucesso!');
                window.location.href = 'produto.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Não foi possível cadastrar este produto!');
                window.location.href = 'produto.php';
            </script>
        ";
    }
}

// Fecha a conexão com o banco
mysqli_close($mysqli);