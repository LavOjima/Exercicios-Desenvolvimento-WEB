<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Processando Envio</title>
</head>
<body>
<?php
// O Exercício 2 pede apenas para mover o arquivo.

// Verifica se o formulário enviou o arquivo 'figura' e se não houve erro no upload.
if (isset($_FILES['figura']) && $_FILES['figura']['error'] == 0) {

    // 1. Pega o nome original que o arquivo tinha no computador do usuário
    $nome_original = $_FILES['figura']['name'];
    
    // 2. Pega o local temporário onde o XAMPP salvou o arquivo
    $local_temporario = $_FILES['figura']['tmp_name'];
    
    // 3. Define a pasta de destino
    $pasta_destino = 'fotos/';
    
    // 4. Define o caminho final (ex: "fotos/minha_imagem.jpg")
    $caminho_final = $pasta_destino . $nome_original;
    
    // 5. Tenta mover o arquivo do local temporário para o destino final
    if (move_uploaded_file($local_temporario, $caminho_final)) {
        // Se deu certo:
        echo "<h1>Sucesso!</h1>";
        echo "<p>O arquivo <strong><?php echo htmlspecialchars($nome_original); ?></strong> foi salvo com sucesso na pasta 'fotos'.</p>";
    } else {
        // Se deu errado:
        echo "<h1>Erro ao mover o arquivo.</h1>";
        echo "<p>Verifique se a pasta 'fotos' existe e se o servidor (Apache/XAMPP) tem permissão para escrever nela.</p>";
    }
    
} else {
    // Se houve erro no envio (ex: nenhum arquivo enviado)
    echo "<h1>Erro no envio.</h1>";
    echo "<p>Nenhum arquivo foi recebido ou ocorreu um erro no upload.</p>";
}
?>

<br>
<a href="index.php">Enviar outra imagem</a>

</body>
</html>