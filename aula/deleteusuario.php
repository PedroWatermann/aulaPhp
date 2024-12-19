<?php

include "conecta.php";

$id = $_GET["id"];
$sql = "DELETE FROM usuario WHERE id = '$id'";

if (mysqli_query($mysqli, $sql)) {
    echo "
        <script>
            alert('Usuário excluído com sucesso!');
            window.location.replace('usuario.php');
        </script>
    ";
} else {
    die("Falha na conexão!" . mysqli_connect_error());
}
