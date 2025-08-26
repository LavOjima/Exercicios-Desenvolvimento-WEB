<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tipo_pao'])) {
        $_SESSION['pedido']['pao'] = $_POST['tipo_pao'];
    }
    header('Location: carne.php');
    exit();
}

$pg_atual = 'pao';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <form action="pao.php" method="post">
        <label>Escolha seu pão:</label>
        <label class="form-option" for="Sal"><input type="radio" name="tipo_pao" value="Pao Sal" id="sal" required> Pão de Sal</label>
        <label class="form-option" for="Brioche"><input type="radio" name="tipo_pao" value="Brioche" id="Brioche"> Brioche</label>
        <label class="form-option" for="Australiano"><input type="radio" name="tipo_pao" value="Pao Australiano" id="Australiano"> Australiano</label>
        <label class="form-option" for="baguete"><input type="radio" name="tipo_pao" value="Baguete" id="baguete"> Baguete</label>
        <input type="submit" value="Próximo">
    </form>
</body>
</html>
<?php ob_end_flush(); ?>