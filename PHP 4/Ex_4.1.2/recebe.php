<?php
session_start();
include 'aluno.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Recebidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
<?php
$pg_atual = 'recebe';
include 'menu.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $curso = $_POST['curso'];
    $nascimento = $_POST['nascimento'];

    
    if (empty($nome) || empty($matricula) || empty($curso) || empty($nascimento)) {
        echo "<div class='alert alert-warning' role='alert'>";
        echo "Você enviou o formulário, mas esqueceu de preencher todos os campos.<br>";
        echo "<a href='formulario.php' class='btn btn-primary mt-2'>Voltar ao formulário</a>";
        echo "</div>";
    } else {
        $aluno = new aluno($nome, $matricula, $curso, $nascimento);
        $_SESSION['aluno'] = $aluno;
        
        echo "<div class='alert alert-success'>Aluno cadastrado com sucesso!</div>";
        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAluno">
                Mostrar Dados
              </button>';
        ?>
        <div class="modal fade" id="modalAluno" tabindex="-1" aria-labelledby="modalAlunoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAlunoLabel">Dados do Aluno Cadastrado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php
                echo "<ul class='list-group list-group-flush'>";
                echo "<li class='list-group-item'><strong>Nome:</strong> " . htmlspecialchars($aluno->nome) . "</li>";
                echo "<li class='list-group-item'><strong>Idade:</strong> " . $aluno->calcularIdade() . " anos</li>";
                echo "<li class='list-group-item'><strong>Matrícula:</strong> " . htmlspecialchars($aluno->matricula) . "</li>";
                echo "<li class='list-group-item'><strong>Curso:</strong> " . htmlspecialchars($aluno->curso) . "</li>";
                
                $dataFormatada = 'Não informada';
                if (!empty($aluno->nascimento)) {
                    $dt = DateTime::createFromFormat('Y-m-d', $aluno->nascimento);
                    $dataFormatada = $dt ? $dt->format('d/m/Y') : 'Data inválida';
                }
                echo "<li class='list-group-item'><strong>Data de Nascimento:</strong> " . $dataFormatada . "</li>";
                echo "</ul>";
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }

} else {
    echo "<div class='alert alert-info' role='alert'>";
    echo "Esta página processa os dados do formulário. Por favor, preencha o formulário primeiro.<br>";
    echo "<a href='formulario.php' class='btn btn-primary mt-2'>Ir para o formulário</a>";
    echo "</div>";
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>