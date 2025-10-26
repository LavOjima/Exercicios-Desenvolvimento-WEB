<?php
// cadastro.php (VERSÃO SEM CRIPTOGRAFIA)
include 'conexao.php'; // Inclui a conexão com o banco

$mensagem = '';

// Verifica se o formulário foi enviado (se o método é POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // <<-- Pegamos a senha direto do formulário
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];

    // LINHA REMOVIDA: $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // O tipo é 'cidadao' por padrão.
    $tipo = 'cidadao';

    try {
        // Prepara o SQL para inserir
        $sql = "INSERT INTO usuarios (nome, email, senha, cpf, nascimento, tipo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // Executa o SQL, passando a variável $senha (e não $senha_hash)
        $stmt->execute([$nome, $email, $senha, $cpf, $nascimento, $tipo]); // <<-- MUDANÇA AQUI

        $mensagem = "Usuário cadastrado com sucesso! Você pode fazer o <a href='login.php'>login agora</a>.";

    } catch (PDOException $e) {
        // Trata erros (ex: email ou CPF duplicado)
        if ($e->errorInfo[1] == 1062) {
            $mensagem = "Erro: E-mail ou CPF já cadastrado.";
        } else {
            $mensagem = "Erro ao cadastrar: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Cidadão</h2>
    
    <?php if (!empty($mensagem)): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <form action="cadastro.php" method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        CPF: <input type="text" name="cpf" required><br><br>
        Data de Nascimento: <input type="date" name="nascimento" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>