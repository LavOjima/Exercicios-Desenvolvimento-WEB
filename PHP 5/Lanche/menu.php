<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($pg_atual)) {
    $pg_atual = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    nav.navbar {
        background-image: linear-gradient(90deg, #a80c0cff, #f142ebff);
        
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
        color: rgba(255, 255, 255, 0.7);
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
<style>

    body {
        background-color: #f8f9fa; 
    }

    form {
        max-width: 600px;       
        margin: 40px auto;     
        padding: 30px;            
        background-color: #ffffff;
        border-radius: 12px;     
        box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
    }

    form > label:first-child {
        display: block;         
        font-size: 1.5rem;       
        font-weight: 500;        
        margin-bottom: 25px;    
        text-align: center;      
        color: #333;
    }

    .form-option {
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: background-color 0.2s, border-color 0.2s;
    }

    .form-option:hover {
        background-color: #f5f5f5;
        border-color: #a80c91ff;
    }

    .form-option input[type="radio"],
    .form-option input[type="checkbox"] {
        margin-right: 15px;      
        width: 1.2em;           
        height: 1.2em;
    }

    form input[type="submit"] {
        width: 100%;            
        padding: 12px;
        margin-top: 20px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #fff;
        background-image: linear-gradient(90deg, #d23bc6ff, #12dcd9ff);
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: opacity 0.3s;
    }

    form input[type="submit"]:hover {
        opacity: 0.9;
    }

     .bg-custom-purple {
        background-image: linear-gradient(90deg, #d23bc6ff, #12dcd9ff);
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  
</head>
<body>
  <div class="container mt-4">

    <nav class="navbar navbar-expand-sm bg-body-tertiary mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Aulas sobre Sessão</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <?php if($pg_atual == 'local'): ?>
              <a class="nav-link active" aria-current="page" href="#">Local</a>
            <?php else: ?>
              <a class="nav-link" href="local.php">Local</a>
            <?php endif; ?>
              
            <li class="nav-item">
            <?php if($pg_atual == 'pao'): ?>
              <a class="nav-link active" aria-current="page" href="#">Tipo de pão</a>
            <?php else: ?>
              <a class="nav-link" href="pao.php">Tipo de Pão</a>
            <?php endif; ?>
              
            </li>

            <li class="nav-item">
            <?php if($pg_atual == 'carne'): ?>
              <a class="nav-link active" aria-current="page" href="#">Tipo de carne</a>
            <?php else: ?>
              <a class="nav-link" href="carne.php">Tipo de Carne</a>
            <?php endif; ?>
              
            </li>

              <li class="nav-item">
            <?php if($pg_atual == 'vegetais'): ?>
              <a class="nav-link active" aria-current="page" href="#">Vegetais</a>
            <?php else: ?>
              <a class="nav-link" href=vegetais.php>Vegetais</a>
            <?php endif; ?>
              
            </li>

            </li>

              <li class="nav-item">
            <?php if($pg_atual == 'queijos'): ?>
              <a class="nav-link active" aria-current="page" href="#">Queijos</a>
            <?php else: ?>
              <a class="nav-link" href=queijos.php>Queijos</a>
            <?php endif; ?>
              
            </li>

             </li>

              <li class="nav-item">
            <?php if($pg_atual == 'molhos'): ?>
              <a class="nav-link active" aria-current="page" href="#">Molhos</a>
            <?php else: ?>
              <a class="nav-link" href=molhos.php>Molhos</a>
            <?php endif; ?>
              
            </li>

            </li>

              <li class="nav-item">
            <?php if($pg_atual == 'resumo'): ?>
              <a class="nav-link active" aria-current="page" href="#">Resumo</a>
            <?php else: ?>
              <a class="nav-link" href=resumo.php>Resumo</a>
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