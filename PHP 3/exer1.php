<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções</title>
</head>
<body>

<?php

    function calcularJurosSimples($capital, $taxa, $tempo)
    {
        return  $capital * ($taxa/100) * $tempo;
    }

    echo "Resultado do Juros Simples: " . calcularJurosSimples(1000, 10 ,1) . "<br>";

     function calcularJurosCompostos($capital, $taxa, $tempo)
    {
        return  $capital * pow((1 + $taxa/100), $tempo);
    }

    echo "Resultado do Juros Compostos: " . calcularJurosCompostos(1000, 10 ,1);
?>
    
</body>
</html>