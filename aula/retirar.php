<?php
session_start();

if (!isset($_SESSION["user"])) { // Verifica se a sessão usuário existe (se está definida e não é null)
    echo "
        <script>
            window.location.replace('index.php');
        </script>
    ";

    // exit() é apenas um alias para die()
    exit(); // Interrompe a execução do script imediatamente
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Retirada</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style/nav.css">
    <link rel="shortcut icon" href="img/iconwhite.png" type="image/x-icon" id="favicon">
</head>

<body>
    <h1 style="text-align: center;">Aula de PHP</h1>
    <hr>
    <nav>
        <?php include "menu.php" ?>
    </nav>
    <br>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Pedidos</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <label for="descricao" class="form-label"><strong>Descrição</strong></label>
                            <select name="descricao" id="descricao" class="form-select" required>
                                <option value="" disabled selected></option>
                            </select>
                            <br>
                            <label for="quantidade" class="form-label"><strong>Quantidade</strong></label>
                            <input type="number" name="quantidade" id="quantidade" class="form-control" required>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Adicionar produto</button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header text-center">
                        <h3>Retirada</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        <form action="#" method="post">
                            <div class="text-center">
                                <button type="submit" name="finalizar_pedido" class="btn btn-primary">Finalizar
                                    pedido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/favicon.js"></script>
</body>

</html>