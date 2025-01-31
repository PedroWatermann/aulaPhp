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

    <title>Editar Usuários</title>

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
                    <h3>Editar Usuário</h3>
                </div>
                <div class="card-body">
                    <?php
                    include "conecta.php";

                    $id = $_GET["id"];

                    $sql = "SELECT * FROM usuario WHERE id = $id";
                    $query = $mysqli->query($sql);
                    while ($dados = $query->fetch_assoc()) {
                        $id = $dados["id"];
                        $nome = $dados["nome"];
                        $genero = $dados["genero"];
                        $cpf = $dados["cpf"];
                        $senha = $dados["senha"];
                        $tipo = $dados["tipo"];
                    }
                    ?>

                    <form action="editausuario.php?id=<?= $id ?>&tipo=<?= $tipo ?>" method="post">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>" required><br>

                        <label for="genero">Gênero:</label>
                        <select name="genero" id="genero" class="form-select">
                            <option value=""></option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                        </select><br>

                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $cpf ?>" required><br>

                        <div class="text-center"><input type="submit" value="Editar" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/favicon.js"></script>

    <script>
        let genero = "<?= $genero ?>";
        genero = genero.toLowerCase();
        let opGen = document.getElementById("genero");
        opGen.value = genero;
    </script>
</body>

</html>