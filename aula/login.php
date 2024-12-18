<?php

session_start(); // Inicia a sessão desse usuário

include "conecta.php"; // Inclui todo o código do conecta.php

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha = '$senha'";
$login = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($login) > 0) {
    $dados = mysqli_fetch_assoc($login); // Cria um array de $login
    $_SESSION["user"] = $dados["nome"]; // Cria uma sessão chamada user que recebe do array a posição nome da query, pois * seleciona tudo

    echo "
        <script>
            window.location.replace('aula.php');
        </script>
    ";
} else {
    echo "
        <script>
            alert('Login ou senha incorretos!');
            window.location.replace('index.php');
        </script>
    ";
}

mysqli_close($mysqli); // Fecha a conexão com o banco. Essa conexão foi aberta no arquivo conecta.php