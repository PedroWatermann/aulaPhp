<?php

include "conecta.php";

$nome = $_SESSION["user"];
$cpf = $_SESSION["cpf"];

$sql = "SELECT tipo FROM usuario WHERE cpf = $cpf";
$query = $mysqli->query($sql);
while ($dados = $query->fetch_assoc()) {
    $tipo = $dados["tipo"];
}

if ($tipo == "A") {
    echo "
        <strong>
            <a onclick='history.go(-1)' id='back'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-left-circle' viewBox='0 0 16 16'>
                    <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z'/>
                </svg>
            </a>
            <span>" . ucfirst($nome) . "</span>
        </strong>

        <div class='nav-links'>
            <a href='aula.php' style='color: black; text-decoration: none;'>Home</a>
            <a href='usuario.php' style='color: black; text-decoration: none;'>Usuários</a>
            <a href='usuario.php' style='color: black; text-decoration: none;'>Produtos</a>
            <a href='usuario.php' style='color: black; text-decoration: none;'>Retirada</a>
            <a href='sair.php' style='color: rgb(193, 18, 31); text-decoration: none;' id='sair'>Sair</a>
        </div>
    ";
} else {
    echo "
        <strong>
            <a onclick='history.go(-1)' id='back'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-left-circle' viewBox='0 0 16 16'>
                    <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z'/>
                </svg>
            </a>
            <span>" . ucfirst($nome) . "</span>
        </strong>

        <div class='nav-links'>
            <a href='aula.php' style='color: black; text-decoration: none;'>Home</a>
            <a href='usuario.php' style='color: black; text-decoration: none;'>Retirada</a>
            <a href='sair.php' style='color: rgb(193, 18, 31); text-decoration: none;' id='sair'>Sair</a>
        </div>
    ";
}
