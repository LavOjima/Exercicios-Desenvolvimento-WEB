<?php
// index.php

include 'conexao.php';

// --- Lógica da Galeria "Mesclada" ---
// O exercício pede "mesclando: uma mais curtida e outra mais nova".
// Vamos buscar as 5 mais curtidas E as 5 mais novas.

// 1. Busca as 5 MAIS CURTIDAS
$stmt_curtidas = $pdo->query("SELECT * FROM imagens ORDER BY curtidas DESC LIMIT 5");
$mais_curtidas = $stmt_curtidas->fetchAll();

// 2. Busca as 5 MAIS NOVAS
$stmt_novas = $pdo->query("SELECT * FROM imagens ORDER BY data_envio DESC LIMIT 5");
$mais_novas = $stmt_novas->fetchAll();

// 3. Lógica para MESCLAR as duas listas sem repetir imagens
$galeria = []; // Array final
$ids_na_galeria = []; // Para controlar duplicatas

// Adiciona as mais curtidas primeiro
foreach ($mais_curtidas as $imagem) {
    $galeria[] = $imagem;
    $ids_na_galeria[] = $imagem['id'];
}

// Adiciona as mais novas, *apenas se* elas já não estiverem na lista
foreach ($mais_novas as $imagem) {
    if (!in_array($imagem['id'], $ids_na_galeria)) {
        $galeria[] = $imagem;
    }
}
// Agora a variável $galeria tem as imagens para exibir
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 4 - Galeria de Imagens</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        h1, h2 { color: #333; }
        .formulario-envio {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .galeria {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Espaço entre as fotos */
        }
        .foto {
            width: 250px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            overflow: hidden; /* Para a imagem não vazar */
        }
        .foto img {
            width: 100%; /* Faz a imagem ocupar todo o espaço */
            height: 180px; /* Altura fixa */
            object-fit: cover; /* Garante que a imagem cubra o espaço sem distorcer */
            display: block;
        }
        .foto-info {
            padding: 15px;
            display: flex;
            justify-content: space-between; /* Alinha "Curtidas" de um lado, "Curtir" do outro */
            align-items: center;
        }
        .foto-info span {
            font-weight: bold;
            color: #555;
        }
        .foto-info a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
        }
        .foto-info a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Galeria de Imagens Anônima</h1>
    
    <div class="formulario-envio">
        <h3>Enviar Nova Imagem</h3>
        <form action="salvar_imagem.php" method="post" enctype="multipart/form-data">
            <label for="id_figura">Arquivo:</label>
            <input type="file" name="figura" id="id_figura" accept="image/png, image/jpeg, image/gif" required>
            <input type="submit" value="Enviar Imagem">
        </form>
    </div>

    <h2>Galeria</h2>
    <div class="galeria">
        
        <?php if (empty($galeria)): ?>
            <p>Nenhuma imagem foi enviada ainda. Seja o primeiro!</p>
        
        <?php else: ?>
            <?php foreach ($galeria as $imagem): ?>
                <div class="foto">
                    <img src="<?php echo htmlspecialchars($imagem['caminho']); ?>" alt="Imagem da galeria">
                    
                    <div class="foto-info">
                        <span>
                            ❤️ <?php echo $imagem['curtidas']; ?>
                        </span>
                        
                        <a href="curtir.php?id=<?php echo $imagem['id']; ?>">Curtir</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>
</body>
</html>