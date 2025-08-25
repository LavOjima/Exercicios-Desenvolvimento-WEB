<?php
include 'aluno.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua idade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
<?php
$pg_atual = 'idade';
include 'menu.php';
if (isset($_SESSION['aluno'])) {
    $aluno = $_SESSION['aluno'];
    echo "<h2>Idade do Aluno</h2>";
    echo "Nome: " . $aluno->nome . "<br>";
    echo "Idade: " . $aluno->calcularIdade() . " anos<br>";
} else {
    echo "Nenhum aluno cadastrado.";
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>