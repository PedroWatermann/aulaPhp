<?php

session_start(); // Inicia a sessão desse usuário

include "conecta.php"; // Inclui todo o código do conecta.php

if (isset($_POST["cpf"], $_POST["senha"]) && !empty($_POST["cpf"]) && !empty($_POST["senha"])) {
    $cpf = strtolower(trim($_POST['cpf'])); // Converte para minúsculas
    $senha = trim($_POST['senha']);

    $sql = "SELECT nome, cpf, senha, tipo FROM usuario WHERE cpf = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $cpf);
        if ($stmt->execute()) {
            $stmt->bind_result($dbnome, $dbcpf, $dbhash, $dbtipo);
            if ($stmt->fetch()) {
                if (password_verify($senha, $dbhash)) {
                    $_SESSION['user'] = $dbnome;
                    $_SESSION['cpf'] = $dbcpf;
                    $_SESSION['tipo'] = $dbtipo;

                    $stmt->close();
                    $mysqli->close();

                    header("Location: aula.php");

                    exit();
                } else {
                    $stmt->close();
                    $mysqli->close();

                    echo "
                        <script>
                            alert('Credenciais inválidas.'); 
                            window.location.replace('index.php');
                        </script>
                    ";

                    exit();
                }
            } else {
                $stmt->close();
                $mysqli->close();

                echo "
                    <script>
                        alert('Credenciais inválidas.'); 
                        window.location.replace('index.php');
                    </script>
                ";

                exit();
            }
        } else {
            error_log("Erro na execução da query: " . $stmt->error);

            $stmt->close();
            $mysqli->close();

            echo "
                <script>
                    alert('Ocorreu um erro interno.'); 
                    window.location.replace('index.php');
                </script>
            ";

            exit();
        }
    } else {
        error_log("Erro na preparação da query: " . $mysqli->error);
        $mysqli->close();
        echo "
            <script>
                alert('Ocorreu um erro interno.'); 
                window.location.replace('index.php');
            </script>
        ";
        exit();
    }
} else {
    echo "
        <script>
            alert('Preencha todos os campos.'); 
            window.location.replace('index.php');
        </script>
    ";
    exit();
}

/* CODIGO COM BCRIPT QUE NÃO FUNCIONOU
if (isset($_POST["cpf"], $_POST["senha"]) && !empty($_POST["cpf"]) && !empty($_POST["senha"])) {
    $cpf = trim($_POST["cpf"]);
    $senha = trim($_POST["senha"]);
    $sql = "SELECT nome, cpf, senha FROM usuario WHERE cpf = ?";
    // Prepara o sql para conversar com o banco
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $stmt->bind_result($dbnome, $dbcpf, $dbhash);

        // Converte/transforma $stmt em uma matriz associativa
        if ($stmt->fetch()) {
            if (password_verify($senha, trim($dbhash))) {
                $_SESSION["user"] = $dbnome;
                echo "
                    <script>
                    console.log('$dbhash, $dbcpf, $dbnome');
                    window.location.replace('aula.php');
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Login ou senha incorretos!');
                        window.location.replace('index.php');
                    </script>
                ";
            }
        }
    }
}

$stmt->close();
mysqli_close($mysqli);
*/


// #####################################################################################

/* CODIGO ANTERIOR À CRIPTOGRAFIA DA SENHA
// Recuperação de variáveis do formulário
$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

// Consulta SQL
$sql = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha = '$senha'";
// Execução da query
$login = mysqli_query($mysqli, $sql);

// Verifica quantas linhas foram retornadas, ou seja, se há registros no banco
if (mysqli_num_rows($login) > 0) {
    // Cria uma matriz associativa a partir do resultado da consulta
    $dados = mysqli_fetch_assoc($login); // mysqli_fetch_assoc é usado para buscar uma linha do resultado da consulta e retorná-la como uma matriz associativa.
    // Cria uma sessão chamada 'user' que recebe do array o valor da posição 'nome' no array (ou seja, a sessão é nomeada com o nome do usuário)
    $_SESSION["user"] = $dados["nome"];

    // Encaminha o usuário para outra página
    echo "
        <script>
            window.location.replace('aula.php');
        </script>
    ";
} else {
    echo "
        <script>
            alert('Login ou senha incorretos!');
            window.location.replace('index.php');
        </script>
    ";
}

// Fecha a conexão com o banco. Essa conexão foi aberta no arquivo conecta.php
mysqli_close($mysqli);
*/


# Funcionamento de variáveis de sessão #
/* 
O nome "user" em $_SESSION["user"] é arbitrário e foi escolhido por você para representar a sessão do usuário logado. Você poderia ter escolhido qualquer outro nome, como "username", "current_user", ou qualquer outro termo que faça sentido para a sua aplicação.

Como Funciona a Nomeação de Variáveis de Sessão
Nome Arbitrário: Você escolhe um nome descritivo para a variável de sessão. Esse nome será usado para acessar os dados da sessão em outras partes do seu código.

Uso Consistente: É importante usar o nome de forma consistente em todo o seu código para evitar confusão e garantir que você está acessando a informação correta.

Exemplo
$_SESSION["user"] = $dados["nome"]; // Nome arbitrário 'user'

Aqui, "user" é apenas uma chave dentro do array $_SESSION, e "nome" é o valor que você está armazenando para essa chave.

Você pode acessar este valor em outras páginas ou partes do seu script da seguinte forma:

echo "Bem-vindo, " . $_SESSION["user"];
*/



/* 
Se você abrir duas guias no mesmo navegador e fizer logins diferentes, ambas as guias compartilharão a mesma sessão e, consequentemente, a mesma variável de sessão $_SESSION["user"]. Isso significa que o valor da chave user será o mesmo em ambas as guias, refletindo o último login feito.

Por quê isso acontece?
As sessões em PHP são gerenciadas usando cookies. Quando você faz login, um cookie de sessão é criado e armazenado no navegador. Esse cookie contém um identificador único (ID de sessão) que é enviado ao servidor com cada requisição subsequente. Como ambas as guias compartilham o mesmo cookie de sessão, elas também compartilham o mesmo ID de sessão e, portanto, o mesmo conjunto de dados da sessão.

Exemplo:
Primeira guia:

Login com cpf: 123 e senha: abc

$_SESSION["user"] = Nome do Usuário A

Segunda guia:

Login com cpf: 456 e senha: def

$_SESSION["user"] = Nome do Usuário B

Resultado:

Ambas as guias agora têm $_SESSION["user"] como Nome do Usuário B.
*/