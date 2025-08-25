<?php
include 'aluno.php';
session_start();

$mensagem_html = '';

if (isset($_SESSION['aluno'])) {
    $nome_aluno = htmlspecialchars($_SESSION['aluno']->nome);

    session_unset();
    session_destroy();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    $mensagem_html = "
        <div class='alert alert-success' role='alert'>
            Olá, <strong>" . $nome_aluno . "</strong>. Sua sessão foi encerrada com sucesso!
        </div>
        <meta http-equiv='refresh' content='5;url=formulario.php'>
        <p>Você será redirecionado para a página de cadastro em 5 segundos.</p>
        <a href='formulario.php' class='btn btn-primary'>Voltar agora</a>
    ";

} else {
    $mensagem_html = "
        <div class='alert alert-info' role='alert'>
            Nenhuma sessão ativa para encerrar.
        </div>
        <p>Você pode cadastrar um novo aluno na página do formulário.</p>
        <a href='formulario.php' class='btn btn-primary'>Ir para o formulário</a>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encerrar sessão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <?php
    $pg_atual = 'sair';
    include 'menu.php';

    echo $mensagem_html;
    ?>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>