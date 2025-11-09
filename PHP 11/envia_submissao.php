<?php
include 'auth.php'; // Garante que o usuário está logado
include 'header.php'; // Inclui o menu de navegação
?>

<h2>Enviar Novo Texto para Avaliação</h2>
<p>Por favor, envie seu texto em formato PDF ou TXT.</p>

<!-- O formulário envia os dados para salva_submissao.php -->
<form action="salva_submissao.php" method="POST" enctype="multipart/form-data">
    Título do Trabalho:<br>
    <input type="text" name="titulo" size="50" required><br><br>

    Observações (opcional):<br>
    <textarea name="observacoes" rows="4" cols="50"></textarea><br><br>

    Arquivo (PDF ou TXT):<br>
    <input type="file" name="arquivo" accept=".pdf,.txt" required><br><br>
    
    <button type="submit">Enviar Submissão</button>
</form>

<?php include 'footer.php'; // Vamos criar um rodapé simples também ?>