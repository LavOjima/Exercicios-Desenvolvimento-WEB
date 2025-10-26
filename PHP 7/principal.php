<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

include 'conexao.php';
$id_usuario = $_SESSION['id_usuario'];
$nome_usuario = $_SESSION['nome_usuario'];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome_tarefa'])) {
    $nome_tarefa = mysqli_real_escape_string($conexao, $_POST['nome_tarefa']);
    $data_limite = $_POST['data_limite'];

    
    $sql_insert = "INSERT INTO tarefas (nome_tarefa, data_limite, id_usuario) 
                   VALUES ('$nome_tarefa', '$data_limite', $id_usuario)";
    
    mysqli_query($conexao, $sql_insert);

    header("Location: principal.php");
    exit();
}


$hoje = date('Y-m-d');
$sql_busca = "SELECT nome_tarefa, data_limite FROM tarefas WHERE id_usuario = $id_usuario AND data_limite <= '$hoje' ORDER BY data_limite";
$resultado_tarefas = mysqli_query($conexao, $sql_busca);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Minhas Tarefas</title>
    <style> body { font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4; } .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); } .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; padding-bottom: 10px; margin-bottom: 20px; } .header a { background-color: #dc3545; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; } .form-tarefa { margin-bottom: 30px; } .form-tarefa input { padding: 8px; width: 60%; margin-right: 10px; } .form-tarefa button { padding: 8px 15px; background: #007bff; color: white; border: none; cursor: pointer; } ul { list-style-type: none; padding: 0; } li { background-color: #f8f9fa; padding: 15px; margin-top: 10px; border-left: 5px solid #007bff; } </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bem-vindo, <?php echo htmlspecialchars($nome_usuario); ?>!</h1>
            <a href="logout.php">Sair</a>
        </div>
        
        <div class="form-tarefa">
            <h3>Adicionar Nova Tarefa</h3>
            <form action="principal.php" method="POST">
                <input type="text" name="nome_tarefa" placeholder="Nome da tarefa" required>
                <input type="date" name="data_limite" required>
                <button type="submit">Adicionar</button>
            </form>
        </div>

        <h2>Tarefas com prazo até hoje:</h2>
        <?php if (mysqli_num_rows($resultado_tarefas) > 0): ?>
            <ul>
                <?php while($tarefa = mysqli_fetch_assoc($resultado_tarefas)): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($tarefa['nome_tarefa']); ?></strong>
                        <br>
                        Data Limite: <?php echo date('d/m/Y', strtotime($tarefa['data_limite'])); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Você não tem tarefas com prazo para hoje ou anterior.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
mysqli_close($conexao);
?>