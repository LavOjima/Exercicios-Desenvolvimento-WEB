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
  <title>Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
  
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php if($pagina_atual == 'home' ): ?>
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          <?php else: ?>
            <a class="nav-link" href="home.php">Home</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <?php if($pagina_atual == 'texto' ): ?>
          <a class="nav-link active" aria-current="page" href="envia_texto.php">Texto</a>
          <?php else: ?>
            <a class="nav-link" href="envia_texto.php">Texto</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <?php if( $pagina_atual == 'tipo' ): ?>
          <a class="nav-link active" aria-current="page" href="envia_tipo.php">Tipo</a>
          <?php else: ?>
            <a class="nav-link" href="envia_tipo.php">Tipo</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <?php if( $pagina_atual == 'cor' ): ?>
          <a class="nav-link active" aria-current="page" href="envia_cor.php">Cor</a>
          <?php else: ?>
            <a class="nav-link" href="envia_cor.php">Cor</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <?php if( $pagina_atual == 'exibir' ): ?>
          <a class="nav-link active" aria-current="page" href="mostra_texto.php">Exibir</a>
          <?php else: ?>
            <a class="nav-link" href="mostra_texto.php">Exibir</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <?php if( $pagina_atual == 'sair' ): ?>
          <a class="nav-link active" aria-current="page" href="sair.php">Sair</a>
          <?php else: ?>
            <a class="nav-link" href="sair.php">Sair</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

