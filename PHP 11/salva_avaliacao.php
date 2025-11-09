<?php
include 'auth.php';
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submissao_id = $_POST['submissao_id'];
    $aprovado = $_POST['aprovado']; // Será '1' ou '0'
    $comentario = $_POST['comentario'];
    // $usuario_id_logado vem do auth.php

    // Validações de segurança no lado do servidor
    // 1. O usuário não pode avaliar o próprio texto
    $sql_check1 = "SELECT usuario_id FROM submissoes WHERE id = ?";
    $stmt_check1 = $pdo->prepare($sql_check1);
    $stmt_check1->execute([$submissao_id]);
    $dono_submissao = $stmt_check1->fetchColumn();

    if ($dono_submissao == $usuario_id_logado) {
        die("Erro: Você não pode avaliar seu próprio texto.");
    }

    // 2. O usuário не pode avaliar o mesmo texto duas vezes
    $sql_check2 = "SELECT id FROM avaliacoes WHERE submissao_id = ? AND usuario_id = ?";
    $stmt_check2 = $pdo->prepare($sql_check2);
    $stmt_check2->execute([$submissao_id, $usuario_id_logado]);
    if ($stmt_check2->fetch()) {
        die("Erro: Você já avaliou este texto.");
    }

    // Se passou em todas as validações, insere no banco
    try {
        $sql = "INSERT INTO avaliacoes (submissao_id, usuario_id, aprovado, comentario) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$submissao_id, $usuario_id_logado, $aprovado, $comentario]);

        // Redireciona de volta para a lista com mensagem de sucesso
        header("Location: submissoes.php?status=avaliado");
        exit;

    } catch (PDOException $e) {
        die("Erro ao salvar a avaliação: " . $e->getMessage());
    }

} else {
    // Se alguém tentar acessar este arquivo diretamente
    header("Location: submissoes.php");
    exit;
}
?>