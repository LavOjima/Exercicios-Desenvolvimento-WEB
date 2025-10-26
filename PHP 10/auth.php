<?php
// auth.php
session_start();

// Se a variável de sessão 'user_id' NÃO EXISTIR
if (!isset($_SESSION['user_id'])) {
    // Redireciona para o login
    header("Location: login.php");
    exit; // Para o script
}

// Se chegamos aqui, o usuário está logado.
// Podemos guardar o ID e o Tipo em variáveis fáceis de usar.
$user_id_logado = $_SESSION['user_id'];
$user_tipo_logado = $_SESSION['user_tipo'];

// Função de segurança extra para verificar se é admin
function checkAdmin() {
    if ($_SESSION['user_tipo'] != 'admin') {
        echo "Acesso negado."; // Ou redireciona para a home
        exit;
    }
}
?>