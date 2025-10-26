<?php

$servidor = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "ctsite";


$conexao = mysqli_connect($servidor, $usuario_db, $senha_db, $banco);


if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8");
?>