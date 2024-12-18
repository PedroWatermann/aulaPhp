<!-- Toda página após o login deverá conter esse trecho de código -->
<?php

session_start(); // Inicia a sessão

if (!isset($_SESSION["user"])) { // Verifica se a sessão usuário existe
    echo "
        <script>
            window.location.replace('index.php');
        </script>
    ";

    exit(); // Sai da sessão que, ocasionalmente, estiver criada
}

?>
<!-- Toda página após o login deverá conter esse trecho de código -->

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="text-align: center;">
    <h1>Aula de PHP</h1>
    <hr>
    <br><br>

    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h3>Aula PHP</h3>
                </div>
                <div class="card-body">
                    <?php
                    
                    $nome = $_SESSION["user"];

                    ?>
                    <h4><strong><?= $nome ?></strong>, você está logado na página!</h4>
                </div>
                <input type="submit" value="Início" class="btn btn-outline-success" onclick="window.location.replace('index.php')">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>