<?php
// Recebe o nome enviado pelo formulário
$A = $_GET['num1'];
$B = $_GET['num2'];

// Exibe a mensagem de boas-vindas
if($A > $B) {
  echo "$A é maior que $B<br>";
};

if($A < $B) {
  echo "$A é menor que $B<br>";
};

if($A >= $B) {
  echo "$A é maior que ou igual a $B<br>";
};

if($A <= $B) {
  echo "$A é menor que ou igual a $B<br>";
};

if($A == $B) {
  echo "$A é igual a $B<br>";
};

if($A != $B) {
  echo "$A é diferente de $B<br>";
};

if($A <> $B) {
  echo "$A é diferente de $B<br>";
};

if($A === $B) {
  echo "$A é identico a $B<br>";
};

if($A === $B) {
  echo "$A é identico a $B<br>";
};

if($A !== $B) {
  echo "$A não é identico a $B<br>";
};

if($A <=> $B) {
    $espaconave = $A <=> $B;
        if($espaconave == -1) {
        echo "$A é menor que $B<br>";
        };
        if($espaconave == 0) {
        echo "$A é igual a $B<br>";
        };
        if($espaconave == 1) {
        echo "$A é maior que $B<br>";
        };
};
?>  