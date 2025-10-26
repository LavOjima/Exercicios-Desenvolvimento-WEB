<?php
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexao.php';

    
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $nascimento = $_POST['nascimento'];
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    
    
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    
    $sql = "INSERT INTO usuarios (usuario, senha, nome, nascimento, cep, numero) 
            VALUES ('$usuario', '$senha', '$nome', '$nascimento', '$cep', '$numero')";

    if (mysqli_query($conexao, $sql)) {
        $mensagem = "Usuário cadastrado com sucesso!";
    } else {
        $mensagem = "Erro: Este nome de usuário já existe.";
    }
    mysqli_close($conexao);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
    <style> body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; margin: 0; } form { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 320px; } input { width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; } button { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; } a { display: block; text-align: center; margin-top: 15px; color: #007bff; text-decoration: none; } .mensagem { text-align: center; margin-bottom: 15px; font-weight: bold; color: green; } </style>
</head>
<body>
    <form action="cadastro.php" method="POST">
        <h2>Crie sua Conta</h2>
        <?php if (!empty($mensagem)): ?>
            <p class="mensagem"><?php echo $mensagem; ?></p>
        <?php endif; ?>
        <input type="text" name="nome" placeholder="Nome Completo" required>
        <input type="text" name="usuario" placeholder="Usuário (para login)" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <label>Data de Nascimento:</label>
        <input type="date" name="nascimento" required>
        <input type="text" name="cep" placeholder="CEP">
        <input type="text" name="numero" placeholder="Número da casa">
        <button type="submit">Cadastrar</button>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
        <a href="login.php">Já tem uma conta? Faça login</a>
    </form>
</body>
</html>