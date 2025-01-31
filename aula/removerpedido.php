<?php
session_start();
if (isset($_GET["index"])) {
    $index = $_GET["index"];
    unset($_SESSION["pedidos"][$index]); // Desconfigura um avariável formecida, tornado-as uma só
    $_SESSION["pedidos"] = array_values($_SESSION["pedidos"]); // Reorganiza o índice
    header("Location: retirar.php");
    exit();
}