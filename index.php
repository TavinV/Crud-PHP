<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJL - Cadastro de Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Página do Formulário Web (Usuário) -->
<header>
    <h1>PJL</h1>
    <a href="./admin-login.html">Administração</a>
    <a href="./usuarios.php">Usuarios</a>
</header>

<main>
    <div class="container">
        <h2>Cadastro</h2>
        <form action="#" method="post" id="form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input autocomplete="off" type="text" id="nome" name="nome" minlength='2' maxlength="50" required>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome</label>
                <input autocomplete="off" type="text" id="sobrenome" name="sobrenome" minlength='2' maxlength="50" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input autocomplete="off" type="tel" id="telefone" name="telefone" maxlength="11" placeholder="xx xx xxxxx-xxxx" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input autocomplete="off" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input autocomplete="off" type="text" id="cidade" name="cidade" required>
            </div>
            <div class="form-group">
                <input autocomplete="off" type="submit" value="Enviar">
            </div>
        </form>
        
    </div>
</main>



<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbnome = "pjldb";

    // Criando a conexão com o banco de dados 
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbnome);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];


        $comando_banco = "INSERT INTO users (nome, sobrenome, telefone, email, cidade) VALUES('$nome', '$sobrenome', '$telefone', '$email', '$cidade')";

        if (mysqli_query($conexao, $comando_banco)) {
            echo "<script>alert('Registro feito com sucesso')</script>";
        } else {
            echo "<script>alert('Registro não concluido ')</script>";
        }
    }
?>
</body>
</html>
