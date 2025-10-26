<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 2 - Enviar Imagem</title>
</head>
<body>
    <h2>Enviar uma Imagem para a Pasta 'fotos'</h2>
    
    <form action="salva_fotos.php" method="post" enctype="multipart/form-data">
        
        <label for="id_figura">Selecione a imagem:</label>
        
        <input type="file" name="figura" id="id_figura" accept="image/*" required>
        
        <br><br>
        
        <input type="submit" value="Salvar Imagem">
    </form>
</body>
</html>