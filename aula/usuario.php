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
    <title>Aula de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
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

    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h3>Usuários</h3>
                    <br>
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar usuário</button>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Gênero</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            include "conecta.php";

                            $sql = "SELECT * FROM usuario ORDER BY nome";
                            $pesquisa = mysqli_query($mysqli, $sql);
                            $row = mysqli_num_rows($pesquisa);
                            if ($row > 0) {
                                while ($registro = $pesquisa->fetch_array()) {
                                    $id = $registro["id"];
                                    echo "
                                        <tr>
                                            <td>" . $registro["nome"] . "</td>
                                            <td>" . $registro["genero"] . "</td>
                                            <td>" . $registro["cpf"] . "</td>
                                            <td><a href='editusuario.php?id=$id' style='color: black; text-decoration: none;'>Editar</a> | <a href='deleteusuario.php?id=$id' style='color: black; text-decoration: none;'>Excluir</a></td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='4'><strong>Nenhum usuário cadastrado!</strong></td></tr>";
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Aqui vai o form
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/icon.js"></script>
</body>

</html>