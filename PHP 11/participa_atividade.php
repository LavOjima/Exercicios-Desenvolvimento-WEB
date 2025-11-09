<?php
include 'auth.php';
include 'conexao.php';
include 'header.php';

if (!isset($_GET['id'])) {
    header("Location: atividades.php");
    exit;
}
$atividade_id = $_GET['id'];

// Busca os detalhes da atividade principal
$sql_ativ = "SELECT a.*, u.usuario AS nome_autor 
             FROM atividades a 
             JOIN usuarios u ON a.usuario_id = u.id 
             WHERE a.id = ?";
$stmt_ativ = $pdo->prepare($sql_ativ);
$stmt_ativ->execute([$atividade_id]);
$atividade = $stmt_ativ->fetch();

if (!$atividade) {
    die("Atividade не encontrada.");
}

// Busca todas as participações (comentários) para esta atividade
$sql_part = "SELECT p.*, u.usuario AS nome_participante 
             FROM participacoes p 
             JOIN usuarios u ON p.usuario_id = u.id 
             WHERE p.atividade_id = ? 
             ORDER BY p.data_participacao ASC";
$stmt_part = $pdo->prepare($sql_part);
$stmt_part->execute([$atividade_id]);
$participacoes = $stmt_part->fetchAll();
?>

<!-- Exibe a atividade original -->
<div style="background-color: #f0f0f0; border: 1px solid #ddd; padding: 15px; margin-bottom: 20px;">
    <h2><?php echo htmlspecialchars($atividade['titulo']); ?></h2>
    <p><strong>Iniciado por:</strong> <?php echo htmlspecialchars($atividade['nome_autor']); ?> em <?php echo date('d/m/Y H:i', strtotime($atividade['data_criacao'])); ?></p>
    <hr>
    <p><?php echo nl2br(htmlspecialchars($atividade['comentario'])); ?></p>
</div>

<!-- Exibe as participações -->
<h3>Participações</h3>
<?php if (count($participacoes) > 0): ?>
    <?php foreach ($participacoes as $part): ?>
        <div style="border: 1px solid #e0e0e0; padding: 10px; margin-bottom: 10px;">
            <p><strong><?php echo htmlspecialchars($part['nome_participante']); ?></strong> respondeu em <?php echo date('d/m/Y H:i', strtotime($part['data_participacao'])); ?>:</p>
            <p><?php echo nl2br(htmlspecialchars($part['comentario'])); ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Ninguém participou ainda. Seja o primeiro!</p>
<?php endif; ?>

<hr>

<!-- Formulário para nova participação -->
<h4>Deixe sua resposta</h4>
<form action="salva_participacao.php" method="POST">
    <input type="hidden" name="atividade_id" value="<?php echo $atividade_id; ?>">
    <textarea name="comentario" rows="5" cols="70" required></textarea><br><br>
    <button type="submit">Enviar Resposta</button>
</form>

<?php include 'footer.php'; ?>