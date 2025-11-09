<?php
session_start();

// Se a variável de sessão 'usuario_id' não existir, redireciona para a página de entrada
if (!isset($_SESSION['usuario_id'])) {
    header("Location: entrada.php");
    exit; // Garante que o script pare de ser executado
}

// Para facilitar, guardamos os dados da sessão em variáveis
$usuario_id_logado = $_SESSION['usuario_id'];
$usuario_nome_logado = $_SESSION['usuario_nome'];
?>