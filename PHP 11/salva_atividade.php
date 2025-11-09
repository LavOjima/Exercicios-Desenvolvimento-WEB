<?php
include 'auth.php';
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $comentario = $_POST['comentario'];
    // $usuario_id_logado vem do auth.php

    try {
        $sql = "INSERT INTO atividades (usuario_id, titulo, comentario) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario_id_logado, $titulo, $comentario]);

        // Redireciona para a lista de "minhas atividades" para ver a nova criação
        header("Location: minhas_atividades.php");
        exit;

    } catch (PDOException $e) {
        die("Erro ao criar a atividade: " . $e->getMessage());
    }
} else {
    header("Location: atividades.php");
    exit;
}
?>