<?php
session_start();

if (!isset($_SESSION["user"])) { // Verifica se a sessão usuário existe (se está definida e não é null)
    echo "
        <script>
            window.location.replace('index.php');
        </script>
    ";
    exit(); // Interrompe a execução do script imediatamente
}

include "conecta.php";

// Inicializa a sessão dos pedidos
if (!isset($_SESSION["pedidos"])) {
    $_SESSION["pedidos"] = [];
}

// Processa a ação do botão "Adicionar produto"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["descricao"]) && isset($_POST["quantidade"])) {
    $id_produto = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];

    // Busca a descrição do produto
    $query = mysqli_query($mysqli, "SELECT descricao FROM produto WHERE id = '$id_produto'");
    $produto = mysqli_fetch_assoc($query);

    // Adiciona os dados ao array da sessão
    $_SESSION["pedidos"][] = ["id" => $id_produto, "descricao" => $produto["descricao"], "quantidade" => $quantidade];

    // Finaliza o pedido e grava no banco de dados
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['finalizar_pedido'])) {
        $colaborador = $_SESSION['user'];
        $datahora = date('Y-m-d H:i:s');

        foreach ($_SESSION['pedidos'] as $pedido) {
            $id_produto = $pedido['id'];
            $descricao = $pedido['descricao'];
            $quantidade = $pedido['quantidade'];

            // Query que insere no banco
            $sql = "INSERT INTO pedidos(id_produto, descricao, quantidade, colaborador, data_hora) VALUES ('$id_produto', '$descricao', '$quantidade', '$colaborador', '$datahora')";
            mysqli_query($mysqli, $sql);
            header("Location: retirar.php");
        }

        // Limpa a sessão
        $_SESSION['pedidos'] = [];
    }

    // Redireciona para evitar o reenvio do formlário
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
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
                        <h3><i class="bi bi-cart"> Pedidos</i></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="descricao" class="form-label"><strong>Descrição</strong></label>
                            <select name="descricao" id="descricao" class="form-select" required>
                                <option value="" disabled selected></option>
                                <?php
                                $pesquisa = mysqli_query($mysqli, "SELECT * FROM produto ORDER BY descricao");
                                $row = mysqli_num_rows($pesquisa); // Recebe o número de linhas resultantes da query
                                if ($row > 0) {
                                    while ($registro = $pesquisa->fetch_array()) {
                                        $id = $registro["id"];
                                        echo "
                                            <option value='$id'>" . $registro['descricao'] . "</option>
                                        ";
                                    }
                                }
                                ?>
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
                        <h3><i class="bi bi-truck"> Retirada</i></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($_SESSION['pedidos'])) {
                                    foreach ($_SESSION['pedidos'] as $index => $pedido) {
                                        echo "
                                        <tr>
                                            <td>{$pedido['id']}</td>
                                            <td>{$pedido['descricao']}</td>
                                            <td>{$pedido['quantidade']}</td>
                                            <td><a href='removerpedido.php?index=$index' class='btn btn-danger btn-sm'>Remover</a></td>
                                            </tr>
                                        ";
                                    }
                                } else {
                                    echo "
                                        <tr>
                                            <td colspan='4' class='text-center'><em>Nenhum pedido realizado!</em></td>
                                        </tr>
                                    ";
                                }
                                ?>
                            </tbody>
                        </table>

                        <form action="" method="post">
                            <div class="text-center">
                                <button type="submit" name="finalizar_pedido" class="btn btn-primary">Finalizar pedido</button>
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