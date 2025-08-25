
<?php
if (!isset($pg_atual)) {
    $pg_atual = '';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aula sobre Sessão</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?php if($pg_atual == 'primeira'): ?>
          <a class="nav-link active" aria-current="page" href="#">Formulario</a>
        <?php else: ?>
          <a class="nav-link" href="primeira.php">Formulario</a>
        <?php endif; ?>
          
        </li>

        <li class="nav-item">
        <?php if($pg_atual == 'salva'): ?>
          <a class="nav-link active" aria-current="page" href="#">Salvar</a>
        <?php else: ?>
          <a class="nav-link" href="salva.php">Salvar</a>
        <?php endif; ?>
          
        </li>

        <li class="nav-item">
        <?php if($pg_atual == 'mostrar'): ?>
          <a class="nav-link active" aria-current="page" href="#">Mostrar</a>
        <?php else: ?>
          <a class="nav-link" href="mostra.php">Mostrar</a>
        <?php endif; ?>
          
        </li>

          <li class="nav-item">
        <?php if($pg_atual == 'Apagar'): ?>
          <a class="nav-link active" aria-current="page" href="#">Apagar</a>
        <?php else: ?>
          <a class="nav-link" href="apagar.php">Apagar</a>
        <?php endif; ?>
          
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<br>
<br>


</body>
</html>

