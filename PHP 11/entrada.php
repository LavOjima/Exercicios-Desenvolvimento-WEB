<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Clube de Escrita</title>
</head>
<body>
    <h2>Entrar no Clube</h2>
    
    <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
        <p style="color:green;">Cadastro realizado com sucesso! Faça o login.</p>
    <?php endif; ?>
    <?php if (isset($_GET['erro'])): ?>
        <p style="color:red;">Usuário, e-mail ou senha inválidos.</p>
    <?php endif; ?>

    <!-- O formulário envia os dados para busca_usuario.php -->
    <form action="busca_usuario.php" method="POST">
        Usuário ou E-mail: <input type="text" name="login" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="cadastro_usuario.php">Cadastre-se</a></p>
</body>
</html>