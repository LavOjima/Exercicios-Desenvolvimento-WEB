<?php
// curtir.php

include 'conexao.php'; // 1. Conecta ao banco

// 2. Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    
    $id_imagem = $_GET['id'];
    
    try {
        // 3. Atualiza o banco, somando 1 na contagem atual
        $sql = "UPDATE imagens SET curtidas = curtidas + 1 WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_imagem]);
        
    } catch (PDOException $e) {
        // Se der erro, não faz nada, apenas redireciona
    }
}

// 4. Redireciona de volta para a página principal
header("Location: index.php");
exit;
?>