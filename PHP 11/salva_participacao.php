<?php
include 'auth.php';
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $atividade_id = $_POST['atividade_id'];
    $comentario = $_POST['comentario'];
    // $usuario_id_logado vem do auth.php

    try {
        $sql = "INSERT INTO participacoes (atividade_id, usuario_id, comentario) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$atividade_id, $usuario_id_logado, $comentario]);

        // Redireciona de volta para a atividade para ver o comentário postado
        header("Location: participa_atividade.php?id=" . $atividade_id);
        exit;

    } catch (PDOException $e) {
        die("Erro ao salvar a participação: " . $e->getMessage());
    }
} else {
    header("Location: atividades.php");
    exit;
}
?>