<?php
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_tarefa'])) {
    $nova_tarefa = [
        'nome' => $_POST['nome_tarefa'],
        'data' => $_POST['data_tarefa']
    ];
    array_push($_SESSION['tarefas'], $nova_tarefa);
    header('Location: index.php?pagina=todas');
    exit();
}

if (isset($_GET['acao']) && $_GET['acao'] == 'apagar') {
    $id_tarefa = $_GET['id'] ?? null;
    if ($id_tarefa !== null && isset($_SESSION['tarefas'][$id_tarefa])) {
        unset($_SESSION['tarefas'][$id_tarefa]);
    }
    header('Location: index.php?pagina=todas');
    exit();
}

header('Location: index.php');
exit();