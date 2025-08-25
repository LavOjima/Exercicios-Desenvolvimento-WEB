<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar sessão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <?php
    $pg_atual = 'Apagar';
    include 'navbar.php';
    session_start();

if (isset($_SESSION['nome'])) {
    echo " Olá " . $_SESSION['nome'] . ", Sessão apagada com sucesso. <br>";
    session_unset();
    session_destroy();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    echo '<meta http-equiv="refresh" content="5;url=primeira.php">';
    echo "Você será redirecionado para a página inicial em 5 segundos.<br>";
    echo "<a href='primeira.php'>Clique aqui se não for redirecionado.</a>";
} else {
    echo "Nenhuma sessão ativa para apagar.<br>";
    echo "Caso não tenha definido um nome, siga o link para a primeira página(a do formulário) para definir um nome.";
    echo "<br><a href='primeira.php'>Primeira</a>";
}
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>