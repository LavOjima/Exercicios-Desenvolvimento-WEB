<?php
include 'auth.php';
include 'conexao.php';
include 'header.php';

// Busca todas as atividades, junto com o nome de usuário do autor
$sql = "SELECT a.id, a.titulo, a.data_criacao, u.usuario AS nome_autor
        FROM atividades a
        JOIN usuarios u ON a.usuario_id = u.id
        ORDER BY a.data_criacao DESC";
$stmt = $pdo->query($sql);
$atividades = $stmt->fetchAll();
?>

<h2>Atividades do Clube</h2>
<p>Participe das discussões e exercícios propostos pelos membros.</p>

<?php if (count($atividades) > 0): ?>
    <table border="1" width="80%">
        <thead>
            <tr>
                <th>Título</th>
                <th>Criado por</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atividades as $atividade): ?>
                <tr>
                    <td><?php echo htmlspecialchars($atividade['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($atividade['nome_autor']); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($atividade['data_criacao'])); ?></td>
                    <td>
                        <a href="participa_atividade.php?id=<?php echo $atividade['id']; ?>">Ver e Participar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhuma atividade foi criada ainda. Que tal <a href="envia_atividade.php">criar a primeira</a>?</p>
<?php endif; ?>

<?php include 'footer.php'; ?>