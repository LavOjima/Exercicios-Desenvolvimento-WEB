<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <?php
    $pg_atual = 'mostrar';
    include 'navbar.php';
    session_start();
    if (isset($_SESSION['nome'])) {
        echo "Nome salvo: " . ($_SESSION['nome']);
    } else {
        echo "Nenhum nome salvo." . "<br>" . "Caso não tenha definido um nome, siga o link para a primeira página(a do formulário) para definir um nome.";
    echo "<br><a href='primeira.php'>Primeira</a>";
    }
     
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>