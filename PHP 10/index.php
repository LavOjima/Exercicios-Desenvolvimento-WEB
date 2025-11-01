<?php
session_start();

// Verifica se o usuário já está logado na sessão
if (isset($_SESSION['user_id'])) {
    
    // Se estiver logado, redireciona baseado no tipo
    if ($_SESSION['user_tipo'] == 'admin') {
        header("Location: painel_admin.php");
        exit;
    } else {
        header("Location: minhas_reclamacoes.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao Sistema de Reclamações</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 100px; }
        h1 { color: #333; }
        a { text-decoration: none; color: #007bff; padding: 10px 20px; border: 1px solid #007bff; border-radius: 5px; margin: 0 10px; }
        a:hover { background-color: #007bff; color: white; }
    </style>
</head>
<body>
    <h1>Sistema de Reclamações</h1>
    <p>Sua satisfação como nosso cliente é importante para nós. Faça o login ou cadastre-se para começar.</p>
    <div>
        <a href="login.php">Entrar (Login)</a>
        <a href="cadastro.php">Cadastrar-se</a>
    </div>
</body>
</html>

