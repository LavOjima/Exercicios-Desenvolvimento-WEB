<?php
include 'auth.php'; // Precisa saber quem está logado para associar a submissão
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. VERIFICAÇÃO DO ARQUIVO
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
        $diretorio_upload = 'submissoes/';
        $nome_arquivo = $_FILES['arquivo']['name'];
        $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

        // Verifica se a extensão do arquivo é permitida (PDF ou TXT)
        if ($extensao != 'pdf' && $extensao != 'txt') {
            die("Erro: Apenas arquivos PDF e TXT são permitidos. <a href='envia_submissao.php'>Tentar novamente</a>.");
        }

        // Cria um nome de arquivo único para evitar sobreposição
        $novo_nome_arquivo = uniqid() . '-' . basename($nome_arquivo);
        $caminho_final = $diretorio_upload . $novo_nome_arquivo;

        // 2. MOVE O ARQUIVO PARA A PASTA DE DESTINO
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho_final)) {
            
            // 3. SALVA AS INFORMAÇÕES NO BANCO DE DADOS
            $titulo = $_POST['titulo'];
            $observacoes = $_POST['observacoes'];
            // $usuario_id_logado vem do 'auth.php'
            
            try {
                $sql = "INSERT INTO submissoes (usuario_id, titulo, observacoes, arquivo) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$usuario_id_logado, $titulo, $observacoes, $caminho_final]);
                
                // Redireciona para a página de "minhas submissões"
                header("Location: minhas_submissoes.php");
                exit;

            } catch (PDOException $e) {
                die("Erro ao salvar no banco de dados: " . $e->getMessage());
            }

        } else {
            die("Erro ao mover o arquivo para o servidor. <a href='envia_submissao.php'>Tentar novamente</a>.");
        }
    } else {
        die("Erro no envio do arquivo. <a href='envia_submissao.php'>Tentar novamente</a>.");
    }
}
?>