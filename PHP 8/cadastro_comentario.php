<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar comentário</title>
</head>
<body>
    <form action="recebe_comentario.php">
       <label for="">ID produto:</label> 
       <?php
        if(isset($_GET['id'])){
        ?>
            <input type="hidden" name="id_produto" value='<?=$_GET['id']?>'><br>
        <?php
        }else{
        ?>
            <input type="hidden" name="id_produto">
        <?php
        }
        ?>
        <label for="">Comentário</label>
        <input type="text" name="comentario">
        <input type="submit">
    </form>
</body>
</html>