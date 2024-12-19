<?php

$nome = $_SESSION["user"];
echo "<strong> $nome </strong>";
echo "<div class='nav-links'>";
echo "<a href='aula.php' style='color: black; text-decoration: none;'>Home</a>";
echo "<a href='usuario.php' style='color: black; text-decoration: none;'>Usuários</a>";
echo "<a href='sair.php' style='color: #c1121f; text-decoration: none;'>Sair</a>";
echo "</div>";
