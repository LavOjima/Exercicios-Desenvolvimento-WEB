<?php
// editar_reclamacao.php
include 'auth.php';
checkAdmin();
include 'conexao.php';

// Pega o ID da URL
if (!isset($_GET['id'])) {
    header("Location: painel_admin.php");
    exit;
}
$id_reclamacao = $_GET['id'];

// Se o formulário de MUDANÇA DE ESTADO foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novo_estado = $_POST['estado'];

    try {
        $sql_update = "UPDATE reclamacao SET estado = ? WHERE id = ?";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->execute([$novo_estado, $id_reclamacao]);
        
        // Redireciona de volta para o painel principal
        header("Location: painel_admin.php");
        exit;
        
    } catch (PDOException $e) {
        $mensagem = "Erro ao atualizar estado: " . $e->getMessage();
    }
}

// Busca os dados da reclamação
$sql_select = "SELECT r.*, u.nome, u.email, u.cpf 
               FROM reclamacao r 
               JOIN usuarios u ON r.id_reclamante = u.id 
               WHERE r.id = ?";
$stmt_select = $pdo->prepare($sql_select);
$stmt_select->execute([$id_reclamacao]);
$reclamacao = $stmt_select->fetch();

if (!$reclamacao) {
    header("Location: painel_admin.php");
    exit;
}

// Lista de estados que o admin pode definir
$estados_possiveis = ['Atribuída', 'Em andamento', 'Resolvida'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Reclamação</title>
</head>
<body>
    <nav>
        <a href="painel_admin.php">Voltar ao Painel</a> | 
        <a href="sair.php">Sair</a>
    </nav>
    
    <h2>Visualizar/Editar Reclamação ID: <?php echo $reclamacao['id']; ?></h2>

    <?php if (!empty($mensagem)): ?>
        <p style="color:red;"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <h3>Dados do Cidadão</h3>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($reclamacao['nome']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($reclamacao['email']); ?></p>
    <p><strong>CPF:</strong> <?php echo htmlspecialchars($reclamacao['cpf']); ?></p>

    <hr>
    
    <h3>Dados da Reclamação</h3>
    <p><strong>Título:</strong> <?php echo htmlspecialchars($reclamacao['titulo']); ?></p>
    <p><strong>Descrição:</strong><br> <?php echo nl2br(htmlspecialchars($reclamacao['descricao'])); ?></p>
    <?php if ($reclamacao['foto']): ?>
        <p><strong>Foto:</strong><br> <img src="<?php echo $reclamacao['foto']; ?>" alt="Foto da Reclamação" width="300"></p>
    <?php endif; ?>

    <hr>

    <h3>Alterar Estado</h3>
    <p><strong>Estado Atual:</strong> <?php echo $reclamacao['estado']; ?></p>
    
    <form action="editar_reclamacao.php?id=<?php echo $id_reclamacao; ?>" method="POST">
        <label for="estado">Mudar estado para:</label>
        <select name="estado" id="estado">
            <?php foreach ($estados_possiveis as $estado): ?>
                <option value="<?php echo $estado; ?>" <?php if ($reclamacao['estado'] == $estado) echo 'selected'; ?>>
                    <?php echo $estado; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Atualizar Estado</button>
    </form>
    
    <hr>
    
    <h3>Avaliação do Cidadão</h3>
    <?php if (!empty($reclamacao['aprovacao'])): ?>
        <p><strong>Resultado:</strong> <?php echo $reclamacao['aprovacao']; ?></p>
        <p><strong>Comentário:</strong><br> <?php echo nl2br(htmlspecialchars($reclamacao['comentario'])); ?></p>
    <?php else: ?>
        <p>O cidadão ainda não avaliou esta resolução.</p>
    <?php endif; ?>

</body>
</html>