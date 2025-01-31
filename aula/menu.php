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
                <i class='bi bi-arrow-left-circle'></i>
            </a>
            <span class='ativo'><i class='bi bi-person-circle'> " . ucfirst($nome) . "</i></span>
        </strong>

        <div class='nav-links'>
            <a href='aula.php' style='color: black; text-decoration: none;' id='home'><i class='bi bi-house'> Home</i></a>
            <a href='usuario.php' style='color: black; text-decoration: none;' id='usua'><i class='bi bi-people'> Usuários</i></a>
            <a href='produto.php' style='color: black; text-decoration: none;' id='prod'><i class='bi bi-box-seam'> Produtos</i></a>
            <a href='retirar.php' style='color: black; text-decoration: none;' id='pedi'><i class='bi bi-cart'> Pedidos</i></a>
            <a href='sair.php' style='color: rgb(193, 18, 31); text-decoration: none;' id='sair'><i class='bi bi-box-arrow-right'> Sair</i></a>
        </div>
    ";
} else {
    echo "
        <strong>
            <a onclick='history.go(-1)' id='back'>
                <i class='bi bi-arrow-left-circle'></i>
            </a>
            <span class='ativo'><i class='bi bi-person-circle'> " . ucfirst($nome) . "</i></span>
        </strong>

        <div class='nav-links'>
            <a href='aula.php' style='color: black; text-decoration: none;' id='home'><i class='bi bi-house'> Home</i></a>
            <a href='retirar.php' style='color: black; text-decoration: none;' id='pedi'><i class='bi bi-cart'> Pedidos</i></a>
            <a href='sair.php' style='color: rgb(193, 18, 31); text-decoration: none;' id='sair'><i class='bi bi-box-arrow-right'> Sair</i></a>
        </div>
    ";
}
