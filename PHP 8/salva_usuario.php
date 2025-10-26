<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salva usuário</title>
</head>
<body>
    <?php
        $servername = 'localhost';
        $banco = 'opina';
        $username = 'root';
        $password = '';

        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $senha = $_GET['senha'];

        $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

        $comando = "INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES (NULL, '$nome', '$email', '$senha')";

        // preparar
        $sth = $conexao->prepare($comando);

        // executar
        $resultado = $sth->execute();

        // verificar resultado
        if($resultado) {
        echo "Usuário ($nome) salvo com sucesso!";
        } else {
        echo "Erro ao salvar o usuário.";
        }
    ?>
</body>
</html>