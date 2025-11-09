<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Busca o usuário pelo nome de usuário OU pelo e-mail
    $sql = "SELECT * FROM usuarios WHERE usuario = ? OR email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login, $login]);
    $usuario = $stmt->fetch();

    // Verifica se o usuário existe E se a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Salva os dados do usuário na sessão
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['usuario'];
        
        // Redireciona para a página principal do sistema (que será a de submissões)
        header("Location: submissoes.php");
        exit;
    } else {
        // Se der erro, volta para a página de entrada
        header("Location: entrada.php?erro=1");
        exit;
    }
}
?>