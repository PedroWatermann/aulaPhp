<!-- Toda página após o login deverá conter esse trecho de código -->
<?php

session_start(); // Inicia a sessão ou recupera a sessão existente

if (!isset($_SESSION["user"])) { // Verifica se a sessão usuário existe (se está definida e não é null)
    echo "
        <script>
            window.location.replace('index.php');
        </script>
    ";

    exit(); // Interrompe a execução do script imediatamente
    // exit() é apenas um alias para die()
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

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

    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center w-100">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h3><i>Home</i> </h3>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == "A") {
                        $sql = mysqli_query($mysqli, "SELECT COUNT(id) as qtde FROM produto");
                        $produtos = mysqli_fetch_assoc($sql);

                        $query = mysqli_query($mysqli,  "SELECT COUNT(DISTINCT data_hora) as qtde FROM pedidos");
                        $pedidos = mysqli_fetch_assoc($query);
                        echo "
                            <h3>Bem vindo, " . ucfirst($_SESSION['user']) . "!</h3>
                            <br>

                            <h5>Produtos cadastrados: <span style='color:blue;'>" . $produtos['qtde'] . "</span></h5>
                            <h5>Pedidos realizados: <span style='color:red;'>" . $pedidos['qtde'] . "</span></h5>
                        ";
                    } else {
                        $query = mysqli_query($mysqli,  "SELECT * FROM pedidos WHERE colaborador = '" . $_SESSION['user'] . "'");
                        echo "
                            <h3>Bem vindo, " . ucfirst($_SESSION['user']) . "!</h3>
                            <br>
                            <table class='table table-hover text-center'>
                                <thead>
                                    <tr>
                                        <th colspan='3'><h4>Pedidos realizados</h4></th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>Descrição</th>
                                        <th scope='col'>Quantidade</th>
                                        <th scope='col'>Data e Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                        ";
                        while ($pedidos = mysqli_fetch_assoc($query)) {
                            echo "
                                    <tr>
                                        <td>" . $pedidos['descricao'] . "</td>
                                        <td>" . $pedidos['quantidade'] . "</td>
                                        <td>" . date('d/m/Y \à\s H:i:s', strtotime($pedidos['data_hora'])) . "</td>
                                    </tr>
                            ";
                        }
                        echo "
                                </tbody>
                            </table
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="js/favicon.js"></script>
</body>

</html>