<?php

include "conecta.php";

$id = $_GET["id"];
$sql = "DELETE FROM produto WHERE id = '$id'";

if (mysqli_query($mysqli, $sql)) {
    echo "
        <script>
            alert('Produto excluído com sucesso!');
            window.location.replace('produto.php');
        </script>
    ";
} else {
    die("Falha na conexão!" . mysqli_connect_error());
}
