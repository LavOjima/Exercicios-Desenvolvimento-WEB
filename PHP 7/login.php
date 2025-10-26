<?php
session_start();
$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexao.php';

    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha_digitada = mysqli_real_escape_string($conexao, $_POST['senha']);

    
    $sql = "SELECT id, nome, senha FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $user = mysqli_fetch_assoc($resultado);
        
       
        if ($senha_digitada == $user['senha']) {
            $_SESSION['id_usuario'] = $user['id'];
            $_SESSION['nome_usuario'] = $user['nome'];
            header("Location: principal.php");
            exit();
        } else {
            $erro = "Usuário ou senha inválidos!";
        }
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
    mysqli_close($conexao);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style> body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; } form { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 300px; } input { width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; } button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; } a { display: block; text-align: center; margin-top: 15px; color: #28a745; text-decoration: none; } .erro { text-align: center; color: red; margin-bottom: 15px; } </style>
</head>
<body>
    <form action="login.php" method="POST">
        <h2>Acessar Sistema</h2>
        <?php if (!empty($erro)): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
        <a href="cadastro.php">Não tem uma conta? Cadastre-se</a>
    </form>
</body>
</html>