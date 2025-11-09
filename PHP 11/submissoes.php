<?php
include 'auth.php';
include 'conexao.php';
include 'header.php';

// Mensagem de sucesso opcional após salvar uma avaliação
if (isset($_GET['status']) && $_GET['status'] == 'avaliado') {
    echo '<p style="color:green;">Avaliação enviada com sucesso!</p>';
}

// Busca todas as submissões de OUTROS usuários, junto com o nome de quem enviou
$sql = "SELECT s.id, s.titulo, s.data_submissao, u.usuario AS nome_autor
        FROM submissoes s
        JOIN usuarios u ON s.usuario_id = u.id
        WHERE s.usuario_id != ? 
        ORDER BY s.data_submissao DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id_logado]);
$submissoes = $stmt->fetchAll();
?>

<h2>Textos para Avaliação</h2>
<p>Aqui estão os textos mais recentes enviados por outros membros do clube.</p>

<?php if (count($submissoes) > 0): ?>
    <table border="1" width="80%">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Data de Envio</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($submissoes as $submissao): ?>
                <tr>
                    <td><?php echo htmlspecialchars($submissao['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($submissao['nome_autor']); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($submissao['data_submissao'])); ?></td>
                    <td>
                        <a href="avalia_submissao.php?id=<?php echo $submissao['id']; ?>">Ler e Avaliar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Não há textos de outros usuários para avaliar no momento.</p>
<?php endif; ?>

<?php include 'footer.php'; ?>