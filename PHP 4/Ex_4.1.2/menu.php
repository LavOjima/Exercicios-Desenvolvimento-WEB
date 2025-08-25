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
  <title>Menu inicial</title>
  <style>
 
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    nav.navbar {
     
        background-image: linear-gradient(90deg, #0c9ba8ff, #e354c7ff);
        
      
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        
        padding: 0.5rem 1rem;
        font-family: 'Poppins', sans-serif; 
    }


    .navbar .navbar-brand {
        color: #ffffff; 
        font-weight: 600; 
        font-size: 1.2rem;
    }


    .navbar .nav-link {
        color: rgba(255, 255, 255, 0.7); /
        font-weight: 500;
        padding: 0.8rem 1rem;
        margin: 0 5px;
        border-radius: 8px; 
        transition: all 0.3s ease-in-out; 
    }

   
    .navbar .nav-link:hover {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.1);
    }

    
    .navbar .nav-link.active {
        color: #ffffff !important; 
        background-color: rgba(255, 255, 255, 0.2); 
        font-weight: 600;
    }

    
    .navbar-toggler {
        border: none; 
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
</style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  
</head>
<body>
  <div class="container mt-4">

    <nav class="navbar navbar-expand-sm bg-body-tertiary mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Aula sobre Sessão</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <?php if($pg_atual == 'formulario'): ?>
              <a class="nav-link active" aria-current="page" href="#">Cadastrar</a>
            <?php else: ?>
              <a class="nav-link" href="formulario.php">Cadastrar</a>
            <?php endif; ?>
              
            <li class="nav-item">
            <?php if($pg_atual == 'mostrar'): ?>
              <a class="nav-link active" aria-current="page" href="#">Mostrar</a>
            <?php else: ?>
              <a class="nav-link" href="mostra.php">Mostrar</a>
            <?php endif; ?>
              
            </li>

            <li class="nav-item">
            <?php if($pg_atual == 'idade'): ?>
              <a class="nav-link active" aria-current="page" href="#">Idade</a>
            <?php else: ?>
              <a class="nav-link" href="mostra_idade.php">Idade</a>
            <?php endif; ?>
              
            </li>

              <li class="nav-item">
            <?php if($pg_atual == 'sair'): ?>
              <a class="nav-link active" aria-current="page" href="#">Sair</a>
            <?php else: ?>
              <a class="nav-link" href="sair.php">Sair</a>
            <?php endif; ?>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </div>
</body>
</html>