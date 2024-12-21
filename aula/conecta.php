<?php

// Informações para a conexão com o banco de dados
$hostname = "localhost"; // O hostname pode ser um domínio ou um IP 
$username = "root";
$password = "";
$database = "aulaphp"; // Nome do banco de dados, não o nome da tabela 

// Estabelece uma nova conexão com o banco de dados MySQL
$mysqli = mysqli_connect($hostname, $username, $password, $database);

// Verifica a conexão
if (!$mysqli) {
    /* Para a execução do programa */
    die("Ocorreu um erro de conexão: " . mysqli_connect_error());
} 
/*else {  // Apenas para teste 
    echo "Conectado com sucesso!";
}*/