<?php
include 'auth.php';
include 'conexao.php';
include 'header.php';

// 1. Busca todas as atividades criadas pelo usuário logado
$sql_atividades = "SELECT * FROM atividades WHERE usuario_id = ? ORDER BY data_criacao DESC";
$stmt_atividades = $pdo->prepare($sql_atividades);
$stmt_atividades->execute([$usuario_id_logado]);
$minhas_atividades = $stmt_atividades->fetchAll();
?>

<h2>Minhas Atividades</h2>

<?php if (count($minhas_atividades) > 0): ?>
    <?php foreach ($minhas_atividades as $atividade): ?>
        <div style="background-color: #f9f9f9; border: 1px solid #ccc; padding: 15px; margin-bottom: 25px;">
            <h3><?php echo htmlspecialchars($atividade['titulo']); ?></h3>
            <p><strong>Sua postagem original:</strong><br><?php echo nl2br(htmlspecialchars($atividade['comentario'])); ?></p>
            
            <hr>
            <h4>Respostas Recebidas:</h4>

            <?php
            // 2. Para cada atividade, busca as participações correspondentes
            $sql_parts = "SELECT p.*, u.usuario AS nome_participante FROM participacoes p JOIN usuarios u ON p.usuario_id = u.id WHERE p.atividade_id = ? ORDER BY p.data_participacao ASC";
            $stmt_parts = $pdo->prepare($sql_parts);
            $stmt_parts->execute([$atividade['id']]);
            $participacoes = $stmt_parts->fetchAll();
            ?>

            <?php if (count($participacoes) > 0): ?>
                <?php foreach ($participacoes as $part): ?>
                    <div style="border-top: 1px dashed #ddd; padding: 10px 0;">
                        <p><strong><?php echo htmlspecialchars($part['nome_participante']); ?></strong> respondeu:</p>
                        <p><?php echo nl2br(htmlspecialchars($part['comentario'])); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Sua atividade ainda não recebeu nenhuma resposta.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Você ainda não criou nenhuma atividade.</p>
<?php endif; ?>

<?php include 'footer.php'; ?>