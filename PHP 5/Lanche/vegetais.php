<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pedido']['vegetais'] = $_POST['vegetais'] ?? [];
    header('Location: queijos.php');
    exit();
}

$pg_atual = 'vegetais';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <form action="vegetais.php" method="post">
        <label>Escolha seus vegetais (opcional)</label>
        <label class="form-option" for="alface"><input type="checkbox" name="vegetais[]" value="Alface" id="alface"> Alface</label>
        <label class="form-option" for="rucula"><input type="checkbox" name="vegetais[]" value="Rúcula" id="rucula"> Rúcula</label>
        <label class="form-option" for="tomate"><input type="checkbox" name="vegetais[]" value="Tomate" id="tomate"> Tomate</label>
        <label class="form-option" for="couve"><input type="checkbox" name="vegetais[]" value="Couve frita" id="couve"> Couve (frita)</label>
        <label class="form-option" for="repolho"><input type="checkbox" name="vegetais[]" value="Repolho" id="repolho"> Repolho</label>
        <label class="form-option" for="pepino"><input type="checkbox" name="vegetais[]" value="Pepino" id="pepino"> Pepino</label>
        <input type="submit" value="Próximo">
    </form>
</body>
</html>
<?php ob_end_flush(); ?>