<!-- Toda página após o login deverá conter esse trecho de código -->
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
            //window.location.replace('aula.php');
            history.go(-1);
        </script>
    ";
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>

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
                    <h3><i>Produtos</i></h3>
                    <br>
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Cadastrar produto</button>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Descricao</th>
                                <th scope="col">Unidade</th>
                                <th scope="col">Quntidade</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            include "conecta.php";

                            $sql = "SELECT * FROM produto ORDER BY descricao";
                            $pesquisa = mysqli_query($mysqli, $sql);
                            $row = mysqli_num_rows($pesquisa);
                            if ($row > 0) {
                                while ($registro = $pesquisa->fetch_array()) {
                                    $id = $registro["id"];

                                    echo "
                                        <tr>
                                            <td>" . $registro["descricao"] . "</td>
                                            <td>" . ucfirst($registro["unidade"]) . "</td>
                                            <td>" . $registro["quantidade"] . "</td>
                                            <td  class='text-nowrap'>
                                                <abbr title='Editar' style='text-decoration:none;'>
                                                    <a href='edproduto.php?id=$id' style='color: black; text-decoration: none;'>
                                                        <i class='bi bi-pencil-square' style='color:blue;font-size:20px;'></i>
                                                    </a>
                                                </abbr>

                                                <i class='bi bi-three-dots-vertical' style='font-size:3px;color:transparent;'></i>
                                                
                                                <abbr title='Excluir' style='text-decoration:none;'>
                                                    <a style='color: black; text-decoration: none; cursor: pointer;' href='deleteproduto.php?id=$id'>
                                                        <i class='bi bi-trash' style='color:red;font-size:20px;'></i>
                                                    </a>
                                                </abbr>
                                            </td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='4'><strong>Nenhum produto cadastrado!</strong></td></tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="cadproduto.php" method="post">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <input type="text" name="descricao" id="descricao" class="form-control" required><br>

                        <label for="unidade">Unidade:</label>
                        <select name="unidade" id="unidade" class="form-select">
                            <option value="" disabled selected></option>
                            <option value="cento">Cento</option>
                            <option value="peça">Peça</option>
                            <option value="caixa">Caixa</option>
                            <option value="resma">Resma</option>
                            <option value="quilo">Quilo</option>
                            <option value="metro">Metro</option>
                        </select><br>

                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" id="quantidade" class="form-control" required><br>

                        <div class="text-center"><input type="submit" value="Cadastrar" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/favicon.js"></script>
</body>

</html>