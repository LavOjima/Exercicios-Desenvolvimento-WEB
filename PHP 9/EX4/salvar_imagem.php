<?php
// salvar_imagem.php

include 'conexao.php'; // 1. Conecta ao banco

// 2. Verifica se o arquivo foi enviado e se não houve erro
if (isset($_FILES['figura']) && $_FILES['figura']['error'] == 0) {
    
    // --- Lógica de Mover o Arquivo ---
    $nome_original = $_FILES['figura']['name'];
    $local_temporario = $_FILES['figura']['tmp_name'];
    
    // Gera um nome ÚNICO para o arquivo, para evitar que uma foto substitua outra
    $extensao = pathinfo($nome_original, PATHINFO_EXTENSION);
    $novo_nome = uniqid() . '-' . time() . '.' . $extensao;
    
    $pasta_destino = 'fotos/';
    $caminho_final = $pasta_destino . $novo_nome;

    // 3. Tenta mover o arquivo
    if (move_uploaded_file($local_temporario, $caminho_final)) {
        
        // 4. Se moveu, SALVA NO BANCO de dados
        try {
            // O caminho salvo será ex: "fotos/60c729a8a4b3d-1623665832.jpg"
            $sql = "INSERT INTO imagens (caminho) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$caminho_final]);
            
        } catch (PDOException $e) {
            // Se der erro no banco, morre e mostra o erro
            die("Erro ao salvar no banco de dados: " . $e.getMessage());
        }

    } else {
        // Se der erro ao mover o arquivo
        die("Erro ao mover o arquivo para a pasta 'fotos'.");
    }
    
} else {
    // Se der erro no upload (ex: arquivo muito grande, nenhum arquivo)
    die("Erro no envio do arquivo. Código do erro: " . $_FILES['figura']['error']);
}

// 5. Se tudo deu certo, redireciona de volta para a galeria
header("Location: index.php");
exit; // Encerra o script
?>