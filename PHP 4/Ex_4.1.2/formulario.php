<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receber dados Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
    <?php

    include 'menu.php';
    $pg_atual = 'formulario';

    ?>
              
<form action="recebe.php" method="post">
    <div class = "mb-3">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome">    
    <label for="matricula">Matrícula:</label>
    <input type="text" id="matricula" name="matricula">    
    </div>
    <div class = "mb-3">
    <label for="curso">Curso:</label>
    <input type="text" id="curso" name="curso">    
    <label for="nascimento">Data de Nascimento:</label>
    <input type="date" style="padding: 1px 25px" id="nascimento" name="nascimento">    
    </div> 
    <button type="submit" style="background-color: #2ac0caff; color: white; padding: 5px 10px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">Enviar</button>
</form>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>