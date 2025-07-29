<?php
// Recebe o nome enviado pelo formulário
$Capital = $_POST['Capital'];
$Taxa = $_POST['Taxa'];
$Tempo = $_POST['Tempo'];

$Juros = ($Capital * $Taxa * $Tempo) /100;
// Exibe a mensagem de boas-vindas
echo "O valor dos juros simples aplicado é: $Juros";
?> 