<?php
// ver_reclamacao.php
include 'auth.php';
include 'conexao.php';

// Pega o ID da URL (?id=...)
if (!isset($_GET['id'])) {
    header("Location: minhas_reclamacoes.php");
    exit;
}
$id_reclamacao = $_GET['id'];

$mensagem = '';

// Se o formulário de APROVAÇÃO foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aprovacao = $_POST['aprovacao'];
    $comentario = $_POST['comentario'];

    try {
        // Atualiza a reclamação
        $sql_update = "UPDATE reclamacao 
                       SET aprovacao = ?, comentario = ? 
                       WHERE id = ? AND id_reclamante = ?";
        
        $stmt_update = $pdo->prepare($sql_update);
        // Segurança: garante que ele só atualize se for o dono
        $stmt_update->execute([$aprovacao, $comentario, $id_reclamacao, $user_id_logado]); 
        
        $mensagem = "Avaliação enviada com sucesso!";
        
    } catch (PDOException $e) {
        $mensagem = "Erro ao enviar avaliação: " . $e->getMessage();
    }
}

// Busca os dados da reclamação no banco
// Segurança: WHERE id = ? AND id_reclamante = ?
// Isso impede que um usuário veja a reclamação de outro trocando o ID na URL
$sql_select = "SELECT * FROM reclamacao WHERE id = ? AND id_reclamante = ?";
$stmt_select = $pdo->prepare($sql_select);
$stmt_select->execute([$id_reclamacao, $user_id_logado]);
$reclamacao = $stmt_select->fetch();

// Se não achou a reclamação (ou não é dele), volta para a lista
if (!$reclamacao) {
    header("Location: minhas_reclamacoes.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ver Reclamação</title>
</head>
<body>
    <nav>
        <a href="minhas_reclamacoes.php">Voltar para Lista</a> | 
        <a href="sair.php">Sair</a>
    </nav>
    
    <h2>Detalhes da Reclamação: <?php echo htmlspecialchars($reclamacao['titulo']); ?></h2>

    <?php if (!empty($mensagem)): ?>
        <p style="color:green;"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <p><strong>ID:</strong> <?php echo $reclamacao['id']; ?></p>
    <p><strong>Estado:</strong> <?php echo $reclamacao['estado']; ?></p>
    <p><strong>Descrição:</strong><br> <?php echo nl2br(htmlspecialchars($reclamacao['descricao'])); ?></p>
    
    <?php if ($reclamacao['foto']): ?>
        <p><strong>Foto:</strong><br> <img src="<?php echo $reclamacao['foto']; ?>" alt="Foto da Reclamação" width="300"></p>
    <?php endif; ?>

    <hr>

    <?php if ($reclamacao['estado'] == 'Resolvida' && empty($reclamacao['aprovacao'])): ?>
        <h3>Avaliar Resolução</h3>
        <form action="ver_reclamacao.php?id=<?php echo $id_reclamacao; ?>" method="POST">
            <input type="radio" name="aprovacao" value="Aprovada" required> Aprovar
            <input type="radio" name="aprovacao" value="Reprovada" required> Reprovar
            <br><br>
            Comentário (obrigatório se reprovar):<br>
            <textarea name="comentario" rows="4" cols="50"></textarea>
            <br><br>
            <button type="submit">Enviar Avaliação</button>
        </form>
    
    <?php elseif (!empty($reclamacao['aprovacao'])): ?>
        <h3>Sua Avaliação</h3>
        <p><strong>Resultado:</strong> <?php echo $reclamacao['aprovacao']; ?></p>
        <p><strong>Seu Comentário:</strong><br> <?php echo nl2br(htmlspecialchars($reclamacao['comentario'])); ?></p>
    <?php endif; ?>

</body>
</html>