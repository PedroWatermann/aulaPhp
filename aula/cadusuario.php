<?php
session_start();

include "conecta.php";

// Captura dos dados do formulário
$nome = $_POST["nome"];
$genero = $_POST["genero"];
$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

// Criptografia da senha
$hash = password_hash($senha, PASSWORD_BCRYPT);

// Utiliza o método query para executar a query e, caso seja bem sucedida, armazena os dados no objeto $query
$query = $mysqli->query("SELECT * FROM usuario WHERE cpf = '$cpf'");
if ($query->num_rows > 0) {
    echo "
        <script>
            alert('Este usuário já existe em nossa base de dados!');
            window.location.href = 'usuario.php';
        </script>
    ";
    exit();
} else {
    $sql = "INSERT INTO usuario(nome, genero, cpf, senha) VALUES ('$nome', '$genero', '$cpf', '$hash')";
    if (mysqli_query($mysqli, $sql)) {
        echo "
            <script>
                alert('Usuário cadastrado com sucesso!');
                window.location.href = 'usuario.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Não foi possível cadastrar este usuário!');
                window.location.href = 'usuario.php';
            </script>
        ";
    }
}

// Fecha a conexão com o banco
mysqli_close($mysqli);