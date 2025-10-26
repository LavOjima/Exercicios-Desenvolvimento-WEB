<?php
// painel_admin.php
include 'auth.php'; // Verifica se está logado
checkAdmin(); // Função do auth.php que verifica se o tipo é 'admin'
include 'conexao.php';

// Busca TODAS as reclamações, juntando com o nome do usuário
$sql = "SELECT r.*, u.nome AS nome_reclamante 
        FROM reclamacao r
        JOIN usuarios u ON r.id_reclamante = u.id
        ORDER BY r.id DESC";
$stmt = $pdo->query($sql);
$reclamacoes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel do Administrador</title>
</head>
<body>
    <nav>
        Olá, Admin <?php echo $_SESSION['user_nome']; ?>! | 
        <a href="sair.php">Sair</a>
    </nav>
    <h2>Gerenciamento de Reclamações</h2>

    <table border="1" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Reclamante</th>
                <th>Estado Atual</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reclamacoes as $reclamacao): ?>
            <tr>
                <td><?php echo $reclamacao['id']; ?></td>
                <td><?php echo htmlspecialchars($reclamacao['titulo']); ?></td>
                <td><?php echo htmlspecialchars($reclamacao['nome_reclamante']); ?></td>
                <td><?php echo $reclamacao['estado']; ?></td>
                <td><a href="editar_reclamacao.php?id=<?php echo $reclamacao['id']; ?>">Alterar Estado</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>