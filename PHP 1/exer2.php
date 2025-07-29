<?php
// Recebe o nome enviado pelo formulário
$Raio = $_GET['Raio'];

$Area = pi() * $Raio * $Raio;
// Exibe a mensagem de boas-vindas
echo "Tamanho da Pizza: $Area";
?> 