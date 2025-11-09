<?php
include 'auth.php';
include 'conexao.php';
include 'header.php';

// Pega o ID da submissão pela URL
if (!isset($_GET['id'])) {
    header("Location: minhas_submissoes.php");
    exit;
}
$submissao_id = $_GET['id'];

// Busca os dados da submissão, garantindo que ela pertence ao usuário logado
$sql_sub = "SELECT * FROM submissoes WHERE id = ? AND usuario_id = ?";
$stmt_sub = $pdo->prepare($sql_sub);
$stmt_sub->execute([$submissao_id, $usuario_id_logado]);
$submissao = $stmt_sub->fetch();

// Se não encontrou (ou não é o dono), redireciona
if (!$submissao) {
    echo "Submissão não encontrada ou você не tem permissão para vê-la.";
    exit;
}

// Busca todas as avaliações feitas para esta submissão
$sql_ava = "SELECT av.*, u.usuario FROM avaliacoes av JOIN usuarios u ON av.usuario_id = u.id WHERE av.submissao_id = ? ORDER BY av.data_avaliacao DESC";
$stmt_ava = $pdo->prepare($sql_ava);
$stmt_ava->execute([$submissao_id]);
$avaliacoes = $stmt_ava->fetchAll();
?>

<h3>Detalhes da Submissão</h3>
<p><strong>Título:</strong> <?php echo htmlspecialchars($submissao['titulo']); ?></p>
<p><strong>Observações:</strong> <?php echo nl2br(htmlspecialchars($submissao['observacoes'])); ?></p>
<p><strong>Arquivo:</strong> <a href="<?php echo htmlspecialchars($submissao['arquivo']); ?>" target="_blank">Baixar/Ver Arquivo</a></p>
<p><strong>Data de Envio:</strong> <?php echo date('d/m/Y H:i', strtotime($submissao['data_submissao'])); ?></p>

<hr>

<h3>Avaliações Recebidas</h3>
<?php if (count($avaliacoes) > 0): ?>
    <?php foreach ($avaliacoes as $avaliacao): ?>
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <p>
                <strong>Avaliador:</strong> <?php echo htmlspecialchars($avaliacao['usuario']); ?> | 
                <strong>Data:</strong> <?php echo date('d/m/Y H:i', strtotime($avaliacao['data_avaliacao'])); ?> |
                <strong>Resultado:</strong> <?php echo $avaliacao['aprovado'] ? '<span style="color:green;">Aprovado</span>' : '<span style="color:red;">Reprovado</span>'; ?>
            </p>
            <p><strong>Comentário:</strong><br> <?php echo nl2br(htmlspecialchars($avaliacao['comentario'])); ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Este texto ainda не recebeu nenhuma avaliação.</p>
<?php endif; ?>

<?php include 'footer.php'; ?>