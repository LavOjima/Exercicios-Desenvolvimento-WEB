<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários</title>
</head>
<body>
    <?php

        $servername = 'localhost';
        $banco = 'opina';
        $username = 'root';
        $password = '';

        $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

        $id_produto = $_GET['id_produto'];
        $comentario = $_GET['comentario'];

        session_start();
        $id_usuario = $_SESSION['id'];
        var_dump($_SESSION);
        $comando = "INSERT INTO `comentarios` (`id`, `comentario`, `id_produto`, `id_comentador`) VALUES (NULL, '$comentario', '$id_produto', '$id_usuario');";
        //echo "$comando";
        // preparar
        $sth = $conexao->prepare($comando);

        // executar
        $resultado = $sth->execute();

        // verificar resultado
        if($resultado) {
        echo "Comentário salvo com sucesso!";
        } else {
        echo "Erro ao salvar o comentário.";
        }
    ?>
</body>
</html>