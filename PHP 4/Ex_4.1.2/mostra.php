<?php
include 'aluno.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
    <?php
    $pg_atual = 'mostra';
    include_once 'menu.php';

    echo "<h2>Dados do Aluno Cadastrado:</h2>";

    if (isset($_SESSION['aluno'])) {
        $aluno = $_SESSION['aluno'];
        ?>
        <div class="card mt-4" style="width: 24rem;">
            <div class="card-header fs-5 fw-bold">
                <?php echo($aluno->nome); ?>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Idade:</strong> <?php echo $aluno->calcularIdade(); ?> anos
                </li>
                <li class="list-group-item">
                    <strong>Matrícula:</strong> <?php echo($aluno->matricula); ?>
                </li>
                <li class="list-group-item">
                    <strong>Curso:</strong> <?php echo($aluno->curso); ?>
                </li>
                <li class="list-group-item">
                    <strong>Data de Nascimento:</strong> 
                    <?php
                        $dataFormatada = 'Não informada';
                        if (!empty($aluno->nascimento)) {
                            $dt = DateTime::createFromFormat('Y-m-d', $aluno->nascimento);
                            if ($dt) {
                                $dataFormatada = $dt->format('d/m/Y');
                            }
                        }
                        echo $dataFormatada;
                    ?>
                </li>
            </ul>
        </div>
        <?php

    } else {
        echo "<div class='alert alert-warning mt-4' role='alert'>";
        echo "Nenhum aluno cadastrado na sessão. Por favor, <a href='formulario.php' class='alert-link'>cadastre um aluno</a> primeiro.";
        echo "</div>";
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>