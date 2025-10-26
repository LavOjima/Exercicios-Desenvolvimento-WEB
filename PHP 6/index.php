<?php
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = array();
}

$pagina = $_GET['pagina'] ?? 'hoje';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a id="link-brand" class="navbar-brand" href="index.php">Tarefas</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a id="link-hoje" class="nav-link" href="index.php?pagina=hoje">Hoje</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pagina=nova">Nova</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pagina=todas">Todas</a>
        </li>
      </ul>
      <span class="navbar-text">
        Total: <?php echo count($_SESSION['tarefas']); ?>
      </span>
    </div>
  </div>
</nav>

<div class="container mt-4">

    <?php if ($pagina == 'nova'): ?>
        <h1>Nova Tarefa</h1>
        <hr>
        <form action="tarefas.php" method="POST">
            <div class="mb-3">
                <label for="nome_tarefa" class="form-label">Nome da Tarefa</label>
                <input type="text" class="form-control" id="nome_tarefa" name="nome_tarefa" required>
            </div>
            <div class="mb-3">
                <label for="data_tarefa" class="form-label">Data</label>
                <input type="date" class="form-control" id="data_tarefa" name="data_tarefa" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

    <?php elseif ($pagina == 'hoje'): ?>
        <?php $data_hoje = $_GET['data_cliente'] ?? date('Y-m-d'); ?>
        <h1>Tarefas de Hoje (<?php echo date('d/m/Y', strtotime($data_hoje)); ?>)</h1>
        <hr>
        <ul class="list-group">
            <?php
            $tem_tarefa_hoje = false;
            foreach ($_SESSION['tarefas'] as $chave => $tarefa) {
                if ($tarefa['data'] == $data_hoje) {
                    $tem_tarefa_hoje = true;
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>"
                       . htmlspecialchars($tarefa['nome'])
                       . "<a href='tarefas.php?acao=apagar&id={$chave}' class='btn btn-danger btn-sm'>Apagar</a>"
                       . "</li>";
                }
            }
            if (!$tem_tarefa_hoje) {
                echo "<p>Nenhuma tarefa agendada para hoje.</p>";
            }
            ?>
        </ul>

    <?php else: ?>
        <h1>Todas as Tarefas</h1>
        <hr>
        <ul class="list-group">
            <?php
            if (empty($_SESSION['tarefas'])) {
                echo "<p>Nenhuma tarefa cadastrada.</p>";
            } else {
                foreach ($_SESSION['tarefas'] as $chave => $tarefa) {
                    $dataFormatada = date('d/m/Y', strtotime($tarefa['data']));
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>"
                       . htmlspecialchars($tarefa['nome']) . " (Data: {$dataFormatada})"
                       . "<a href='tarefas.php?acao=apagar&id={$chave}' class='btn btn-danger btn-sm'>Apagar</a>"
                       . "</li>";
                }
            }
            ?>
        </ul>
    <?php endif; ?>

</div>

<script>

        // Mauro essa parte em específico foi colocada porque se o usuário estiver em um fuso horário diferente do servidor, a data "hoje" pode não corresponder corretamente. Assim, o código pega a data local do navegador do cliente e o horário é ajustado pra quando clicar no link "Hoje" a data estar correta de acordo com o fuso horário do cliente. Essa aqui tive que apelar para IA porque não tava entendendo o problema, ai ela me explicou, resolveu e fui tentando entender o que ela fez para aplicar aqui da forma certa

    document.addEventListener("DOMContentLoaded", function() {
        const params = new URLSearchParams(window.location.search);
        const paginaAtual = params.get('pagina') || 'hoje';
        const dataNaUrl = params.get('data_cliente');
        
        const hoje = new Date();
        const dataFormatada = hoje.getFullYear() + '-' + String(hoje.getMonth() + 1).padStart(2, '0') + '-' + String(hoje.getDate()).padStart(2, '0');

        if (paginaAtual === 'hoje' && dataNaUrl !== dataFormatada) {
            window.location.href = `index.php?pagina=hoje&data_cliente=${dataFormatada}`;
            return;
        }

        const urlComData = `index.php?pagina=hoje&data_cliente=${dataFormatada}`;
        document.getElementById('link-brand').href = urlComData;
        document.getElementById('link-hoje').href = urlComData;
    });
</script>

</body>
</html>