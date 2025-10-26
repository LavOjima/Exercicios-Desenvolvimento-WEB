<?php
// minhas_reclamacoes.php
include 'auth.php'; // Verifica se está logado
include 'conexao.php';

// Busca no banco SÓ AS RECLAMAÇÕES deste usuário
$sql = "SELECT id, titulo, estado FROM reclamacao WHERE id_reclamante = ? ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id_logado]);
$reclamacoes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Minhas Reclamações</title>
</head>
<body>
    <nav>
        Olá, <?php echo $_SESSION['user_nome']; ?>! | 
        <a href="nova_reclamacao.php">Nova Reclamação</a> | 
        <a href="sair.php">Sair</a>
    </nav>
    <h2>Minhas Reclamações</h2>

    <?php if (count($reclamacoes) == 0): ?>
        <p>Você ainda não fez nenhuma reclamação.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reclamacoes as $reclamacao): ?>
                <tr>
                    <td><?php echo $reclamacao['id']; ?></td>
                    <td><?php echo htmlspecialchars($reclamacao['titulo']); ?></td>
                    <td><?php echo $reclamacao['estado']; ?></td>
                    <td><a href="ver_reclamacao.php?id=<?php echo $reclamacao['id']; ?>">Ver Detalhes</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>