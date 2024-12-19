<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="text-align: center;">Aula de PHP</h1>
    <hr>
    <br><br>

    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" required><br>

                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" required><br>

                        <input type="submit" value="Login" class="btn btn-outline-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>