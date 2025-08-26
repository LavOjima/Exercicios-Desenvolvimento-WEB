<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tipo_carne'])) {
        $_SESSION['pedido']['carne'] = $_POST['tipo_carne'];
    }
    header('Location: vegetais.php');
    exit();
}

$pg_atual = 'carne';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <form action="carne.php" method="post">
        <label>Escolha sua carne:</label>
        <label class="form-option" for="bovina"><input type="radio" name="tipo_carne" value="Bovina" id="bovina" required> Bovina</label>
        <label class="form-option" for="suina"><input type="radio" name="tipo_carne" value="Suína" id="suina"> Suína</label>
        <label class="form-option" for="frango"><input type="radio" name="tipo_carne" value="Frango" id="frango"> Frango</label>
        <input type="submit" value="Próximo">
    </form>
</body>
</html>
<?php ob_end_flush(); ?>