<?php

// O hostname pode ser um domínio ou um IP 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "aulaphp"; // Nome do banco de dados, não o nome da tabela 
$mysqli = mysqli_connect($hostname, $username, $password, $database);
if (!$mysqli) {
    /* Para a execução do programa */
    die("Falha na conexão!". mysqli_connect_error());
} /*else {  // Apenas para teste 
    echo "Conectado com sucesso!";
}*/