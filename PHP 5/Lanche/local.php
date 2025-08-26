<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['leva_loca'])) {
        $_SESSION['pedido']['local'] = $_POST['leva_loca'];
    }
    header('Location: pao.php');
    exit();
}

$pg_atual = 'local';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <form action="local.php" method="post">
        <label>Forma de entrega</label>
        <label class="form-option" for="levar"><input type="radio" name="leva_loca" value="Levar" id="levar" required>Viagem</label>
        <label class="form-option" for="local"><input type="radio" name="leva_loca" value="Comer no Local" id="local">Comer no local</label>
        <input type="submit" value="Próximo">
    </form>
</body>
</html>
<?php ob_end_flush(); ?>