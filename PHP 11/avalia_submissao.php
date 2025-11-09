<?php
include 'auth.php';
include 'conexao.php';
include 'header.php';

// Pega o ID da submissao pela URL
if (!isset($_GET['id'])) {
    header("Location: submissoes.php");
    exit;
}
$submissao_id = $_GET['id'];

// Busca os detalhes da submissão E o nome do autor
$sql_sub = "SELECT s.*, u.usuario AS nome_autor 
            FROM submissoes s 
            JOIN usuarios u ON s.usuario_id = u.id 
            WHERE s.id = ?";
$stmt_sub = $pdo->prepare($sql_sub);
$stmt_sub->execute([$submissao_id]);
$submissao = $stmt_sub->fetch();

if (!$submissao) {
    echo "Erro: Submissão não encontrada.";
    include 'footer.php';
    exit;
}

// Segurança: Impede que o usuário avalie o próprio texto
if ($submissao['usuario_id'] == $usuario_id_logado) {
    echo "Você не pode avaliar seu próprio texto. <a href='submissoes.php'>Voltar</a>";
    include 'footer.php';
    exit;
}

// Segurança: Verifica se o usuário já avaliou este texto
$sql_check = "SELECT id FROM avaliacoes WHERE submissao_id = ? AND usuario_id = ?";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->execute([$submissao_id, $usuario_id_logado]);
$ja_avaliou = $stmt_check->fetch();

?>

<h3>Avaliação do Texto: "<?php echo htmlspecialchars($submissao['titulo']); ?>"</h3>
<p><strong>Autor:</strong> <?php echo htmlspecialchars($submissao['nome_autor']); ?></p>
<p><strong>Observações do Autor:</strong> <?php echo nl2br(htmlspecialchars($submissao['observacoes'])); ?></p>
<p><strong>Arquivo:</strong> <a href="<?php echo htmlspecialchars($submissao['arquivo']); ?>" target="_blank">Baixar/Ver Texto</a></p>

<hr>

<?php if ($ja_avaliou): ?>
    <h4 style="color:blue;">Você já avaliou este texto.</h4>
    <p>Obrigado pela sua contribuição!</p>
<?php else: ?>
    <h4>Formulário de Avaliação</h4>
    <form action="salva_avaliacao.php" method="POST">
        <!-- Campo escondido para enviar o ID da submissão -->
        <input type="hidden" name="submissao_id" value="<?php echo $submissao['id']; ?>">

        <strong>Sua avaliação:</strong><br>
        <input type="radio" name="aprovado" value="1" required> Aprovar
        <input type="radio" name="aprovado" value="0" required> Reprovar
        <br><br>

        <strong>Comentário construtivo:</strong><br>
        <textarea name="comentario" rows="6" cols="70" required></textarea>
        <br><br>

        <button type="submit">Enviar Avaliação</button>
    </form>
<?php endif; ?>

<?php include 'footer.php'; ?>