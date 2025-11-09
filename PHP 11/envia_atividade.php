<?php
include 'auth.php';
include 'header.php';
?>

<h2>Criar Nova Atividade</h2>
<p>Inicie uma discussão, proponha um exercício ou compartilhe uma ideia com o clube.</p>

<form action="salva_atividade.php" method="POST">
    Título da Atividade:<br>
    <input type="text" name="titulo" size="70" required><br><br>

    Comentário / Descrição Inicial:<br>
    <textarea name="comentario" rows="8" cols="70" required></textarea><br><br>

    <button type="submit">Publicar Atividade</button>
</form>

<?php include 'footer.php'; ?>