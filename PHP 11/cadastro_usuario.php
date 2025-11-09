<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Clube de Escrita</title>
</head>
<body>
    <h2>Crie sua Conta</h2>
    <!-- O formulário envia os dados para salva_usuario.php -->
    <form action="salva_usuario.php" method="POST">
        Nome Completo: <input type="text" name="nome_completo" required><br><br>
        Usuário (login): <input type="text" name="usuario" required><br><br>
        E-mail: <input type="email" name="email" required><br><br>
        Data de Nascimento: <input type="date" name="data_nascimento" required><br><br>
        CPF: <input type="text" name="cpf" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p>Já tem uma conta? <a href="entrada.php">Faça o login</a></p>
</body>
</html>