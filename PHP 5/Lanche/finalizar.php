<?php ob_start(); ?>
<?php
 include 'menu.php';

if (isset($_GET['acao']) && $_GET['acao'] == 'cancelar') {
    
    session_unset();

    session_destroy();

    header('Location: local.php');
    exit();
}

session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <div class="card text-center" style="max-width: 600px; margin: 40px auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 12px;">
        <div class="card-header bg-custom-purple text-white">
            <h2 class="mb-0">Tudo Certo!</h2>
        </div>
        <div class="card-body p-5">
            <h1 class="card-title text-success">Pedido Confirmado!</h1>
            <p class="card-text fs-5 mt-3">Seu pedido já está sendo preparado. Obrigada pela preferência!</p>
            <a href="local.php" class="btn btn-primary mt-4" style="background-image: linear-gradient(90deg, #12afacff, #bf2cb8ff); border: none;">Fazer um Novo Pedido</a>
        </div>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>