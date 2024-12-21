<?php

$nome = $_SESSION["user"];
echo "
    <strong> $nome </strong>

    <div class='nav-links'>
        <a href='aula.php' style='color: black; text-decoration: none;'>Home</a>
        <a href='usuario.php' style='color: black; text-decoration: none;'>Usuários</a>
        <a href='sair.php' style='color: rgb(193, 18, 31); text-decoration: none;' id='sair'>Sair</a>
    </div>
";
