<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
</head>
<body>
    <?php
        session_start();
        $servername = 'localhost';
        $banco = 'opina';
        $username = 'root';
        $password = '';

        $email = $_GET['email'];
        $senha = $_GET['senha'];

        $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

        $comando = "SELECT `id`, `nome` FROM `usuarios` WHERE `email` LIKE '$email' AND `senha` LIKE '$senha'";

        $resultado = $conexao->query($comando);

        $linha = $resultado->fetch(PDO::FETCH_ASSOC);

        // verificar resultado
        if($linha) {
            // id do usuário é salvo na sessão:
             $_SESSION['id'] = $linha['id'];
            // nome do usuário é salvo na sessão:
             $_SESSION['nome'] = $linha['nome'];
             echo "Bem vindo, {$linha['nome']}";
        } else {
            echo "Erro ao entrar. Email ou senha inválidos.";
        }

        

    ?>
</body>
</html>