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

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                                <th scope="col">Gênero</th>
                                <th scope="col">CPF</th>
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
                                            <td>" . ucfirst($registro["genero"]) . "</td>
                                            <td>" . $registro["cpf"] . "</td>
                                            <td>
                                                <a href='editusuario.php?id=$id' style='color: black; text-decoration: none;'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='blue' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                                    </svg>
                                                </a>

                                                <svg xmlns='http://www.w3.org/2000/svg' width='5' height='5' fill='transparent' class='bi bi-three-dots-vertical' viewBox='0 0 16 16'>
                                                    <path d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0'/>
                                                </svg>

                                                <a href='deleteusuario.php?id=$id' style='color: black; text-decoration: none;'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red' class='bi bi-trash' viewBox='0 0 16 16'>
                                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                                    </svg>
                                                </a>
                                            </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="cadusuario.php" method="post">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required><br>

                        <label for="genero">Gênero:</label>
                        <select name="genero" id="genero" class="form-select">
                            <option value="" disabled selected></option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                        </select><br>

                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" required><br>

                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" required><br>

                        <div class="text-center"><input type="submit" value="Cadastrar" class="btn btn-outline-success"></div>
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