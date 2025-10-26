<?php
// nova_reclamacao.php
include 'auth.php'; // 1. Verifica se está logado
include 'conexao.php';

$mensagem = '';

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $id_reclamante = $user_id_logado; // Vem do auth.php
    $foto_caminho = null; // Começa como nulo

    // --- Lógica de Upload da Foto ---
    // Verifica se um arquivo foi enviado E se não houve erro
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto_tmp = $_FILES['foto']['tmp_name']; // Nome temporário do arquivo
        $foto_nome = basename($_FILES['foto']['name']); // Nome original do arquivo
        
        // Gera um nome único para evitar sobreposição de arquivos
        $extensao = strtolower(pathinfo($foto_nome, PATHINFO_EXTENSION));
        $novo_nome = uniqid() . '-' . md5($foto_nome) . '.' . $extensao;

        $diretorio_upload = 'img/'; // Pasta que criamos
        $foto_caminho = $diretorio_upload . $novo_nome;

        // Move o arquivo temporário para o destino final
        if (move_uploaded_file($foto_tmp, $foto_caminho)) {
            // Upload com sucesso
        } else {
            $mensagem = "Erro ao fazer upload da foto.";
            $foto_caminho = null; // Falhou, então salva como nulo
        }
    }
    // --- Fim da Lógica de Upload ---

    // Insere no banco
    // O estado padrão é 'Enviada' (definido no banco de dados)
    if (empty($mensagem)) {
        try {
            $sql = "INSERT INTO reclamacao (id_reclamante, titulo, descricao, foto) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_reclamante, $titulo, $descricao, $foto_caminho]);
            
            header("Location: minhas_reclamacoes.php"); // Sucesso, redireciona
            exit;

        } catch (PDOException $e) {
            $mensagem = "Erro ao salvar reclamação: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nova Reclamação</title>
</head>
<body>
    <nav>
        Olá, <?php echo $_SESSION['user_nome']; ?>! | 
        <a href="minhas_reclamacoes.php">Minhas Reclamações</a> | 
        <a href="sair.php">Sair</a>
    </nav>

    <h2>Abrir Nova Reclamação</h2>
    <?php if (!empty($mensagem)): ?>
        <p style="color:red;"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <form action="nova_reclamacao.php" method="POST" enctype="multipart/form-data">
        Título: <input type="text" name="titulo" required><br><br>
        Descrição: <textarea name="descricao" rows="5" cols="40" required></textarea><br><br>
        Foto (Opcional): <input type="file" name="foto" accept="image/png, image/jpeg"><br><br>
        <button type="submit">Enviar Reclamação</button>
    </form>
</body>
</html>