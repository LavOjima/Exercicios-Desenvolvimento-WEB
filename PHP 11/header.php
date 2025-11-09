<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clube de Escrita</title>
    <style>
        body { font-family: sans-serif; margin: 0; }
        nav { background-color: #333; color: white; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; }
        nav a { color: white; text-decoration: none; padding: 0 15px; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <nav>
        <div>
            <!-- Links de navegação principais -->
            <a href="submissoes.php">Ver Submissões</a>
            <a href="atividades.php">Ver Atividades</a>
            <a href="envia_submissao.php">Enviar Texto</a>
            <a href="envia_atividade.php">Criar Atividade</a>
        </div>
        <div>
            <!-- Links do usuário -->
            <span>Olá, <?php echo htmlspecialchars($usuario_nome_logado); ?>!</span>
            <a href="minhas_submissoes.php">Minhas Submissões</a>
            <a href="minhas_atividades.php">Minhas Atividades</a>
            <a href="sair.php">Sair</a>
        </div>
    </nav>
    <main style="padding: 20px;">