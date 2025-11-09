<?php
include 'auth.php';
include 'conexao.php';
include 'header.php';

// Busca no banco de dados todas as submissões feitas pelo usuário logado
$sql = "SELECT id, titulo, data_submissao FROM submissoes WHERE usuario_id = ? ORDER BY data_submissao DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id_logado]);
$submissoes = $stmt->fetchAll();
?>

<h2>Minhas Submissões</h2>

<?php if (count($submissoes) > 0): ?>
    <table border="1" width="80%">
        <thead>
            <tr>
                <th>Título</th>
                <th>Data de Envio</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($submissoes as $submissao): ?>
                <tr>
                    <td><?php echo htmlspecialchars($submissao['titulo']); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($submissao['data_submissao'])); ?></td>
                    <td>
                        <a href="visualiza_submissao.php?id=<?php echo $submissao['id']; ?>">Ver Detalhes e Avaliações</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Você ainda não enviou nenhum texto.</p>
<?php endif; ?>

<?php include 'footer.php'; ?>