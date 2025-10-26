<?php
// login.php (VERSÃO SEM CRIPTOGRAFIA)
session_start(); // Inicia a sessão NO TOPO do arquivo
include 'conexao.php';

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Busca o usuário no banco pelo email
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(); // Pega o primeiro resultado

    // 1. Verifica se o usuário existe
    // 2. Verifica se a senha digitada é IGUAL à senha no banco
    if ($usuario && $senha === $usuario['senha']) { // <<-- MUDANÇA IMPORTANTE AQUI
        
        // Se bateu, salva as informações do usuário na SESSÃO
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user_nome'] = $usuario['nome'];
        $_SESSION['user_tipo'] = $usuario['tipo'];

        // Redireciona o usuário baseado no tipo
        if ($usuario['tipo'] == 'admin') {
            header("Location: painel_admin.php");
            exit;
        } else {
            header("Location: minhas_reclamacoes.php"); // Página do cidadão
            exit;
        }

    } else {
        $mensagem = "E-mail ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($mensagem)): ?>
        <p style="color:red;"><?php echo $mensagem; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        Email: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
</body>
</html>