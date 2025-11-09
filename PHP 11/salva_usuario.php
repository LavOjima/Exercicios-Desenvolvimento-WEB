<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Criptografa a senha - ESSENCIAL para segurança
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nome_completo, usuario, email, data_nascimento, cpf, senha) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome_completo, $usuario, $email, $data_nascimento, $cpf, $senha_hash]);

        // Redireciona para a página de login com uma mensagem de sucesso
        header("Location: entrada.php?status=sucesso");
        exit;

    } catch (PDOException $e) {
        // Erro 1062 é para entradas duplicadas (usuário, email ou cpf)
        if ($e->errorInfo[1] == 1062) {
            echo "Erro: Usuário, e-mail ou CPF já cadastrado. <a href='cadastro_usuario.php'>Tente novamente</a>.";
        } else {
            echo "Erro ao cadastrar: " . $e->getMessage();
        }
    }
}
?>