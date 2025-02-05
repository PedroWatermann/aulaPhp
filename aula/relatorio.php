<?php

session_start(); // Inicia a sessão ou recupera a sessão existente

if (!isset($_SESSION["user"])) { // Verifica se a sessão usuário existe (se está definida e não é null)
    echo "
        <script>
            window.location.replace('index.php');
        </script>
    ";

    // exit() é apenas um alias para die()
    exit(); // Interrompe a execução do script imediatamente
}

$tipo = $_SESSION["tipo"];

if ($tipo == "C") {
    echo "
        <script>
            window.location.replace('relco.php');
        </script>
    ";
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Relatórios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style/nav.css">
    <link rel="shortcut icon" href="img/iconwhite.png" type="image/png" id="favicon">
</head>

<body>
    <h1 style="text-align: center;">Aula de PHP</h1>
    <hr>
    <nav>
        <?php include "menu.php" ?>
    </nav>
    <br>
    <br>

    <div class="row justify-content-center row-cols-1 row-cols-md-4 mb-3 text-center w-100">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><i>Produtos Pedidos</i></h4>
                </div>
                <div class="card-body">
                    <?php
                    include "grafico.php";
                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><i>Pedidos por Data</i></h4>
                </div>
                <div class="card-body">
                    <form action="pedidosData.php" method="post">
                        <label for="dataInicial" class="form-label">Data inicial:</label>
                        <input type="date" name="dataInicial" id="dataInicial" class="form-control" required><br>

                        <label for="dataFinal" class="form-label">Data final:</label>
                        <input type="date" name="dataFinal" id="dataFinal" class="form-control" required><br>

                        <div class="text-center"><input type="submit" value="Consultar" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><i>Produtos em Estoque</i></h4>
                </div>
                <div class="card-body">
                    <i class='bi bi-box-seam' style="font-size: 10em; color: green;"></i>
                    <br>
                    <a href="produtoEstoque.php" class="btn btn-outline-success btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">Consultar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/favicon.js"></script>
</body>

</html>