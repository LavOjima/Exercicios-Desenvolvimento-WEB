<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pedido']['queijos'] = $_POST['queijos'] ?? [];
    header('Location: molhos.php');
    exit();
}

$pg_atual = 'queijos';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <form action="queijos.php" method="post">
        <label>Escolha seu queijo (opcional)</label>
        <label class="form-option" for="cheddar"><input type="checkbox" name="queijos[]" value="Cheddar" id="cheddar"> Cheddar</label>
        <label class="form-option" for="prato"><input type="checkbox" name="queijos[]" value="Prato" id="prato"> Prato</label>
        <label class="form-option" for="mucarela"><input type="checkbox" name="queijos[]" value="Muçarela" id="mucarela"> Muçarela</label>
        <label class="form-option" for="parmesao"><input type="checkbox" name="queijos[]" value="Parmesão" id="parmesao"> Parmesão</label>
        <input type="submit" value="Próximo">
    </form>
</body>
</html>
<?php ob_end_flush(); ?>