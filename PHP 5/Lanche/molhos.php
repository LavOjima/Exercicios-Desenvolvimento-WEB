<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pedido']['molhos'] = $_POST['molhos'] ?? [];
    header('Location: resumo.php');
    exit();
}

$pg_atual = 'molhos';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <form action="molhos.php" method="post">
        <label>Escolha seus molhos (opcional)</label>
        <label class="form-option" for="mostarda"><input type="checkbox" name="molhos[]" value="Mostarda" id="mostarda"> Mostarda</label>
        <label class="form-option" for="maionese"><input type="checkbox" name="molhos[]" value="Maionese" id="maionese"> Maionese</label>
        <label class="form-option" for="ketchup"><input type="checkbox" name="molhos[]" value="Ketchup" id="ketchup"> Ketchup</label>
        <label class="form-option" for="ketchup"><input type="checkbox" name="molhos[]" value="Barbecue" id="Barbecue"> Barbecue</label>
        <input type="submit" value="Ver Resumo do Pedido">
    </form>
</body>
</html>
<?php ob_end_flush(); ?>