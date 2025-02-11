<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa - PJL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Página de Acesso para Administrador -->
<header>
    <h1>PJL- Área Administrativa</h1>
    <a href="./index.php">Home</a>
</header>

<main>
    <div class="login-container">
        <h2>Área de Login do Administrador</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="admin-user">Usuário</label>
                <input type="text" id="admin-user" name="admin-user" required>
            </div>
            <div class="form-group">
                <label for="admin-pass">Senha</label>
                <input type="password" id="admin-pass" name="admin-pass" required>
            </div>
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</main>

<!-- <script src="./js/login.js"></script> -->

<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbnome = "pjldb";

    // Criando a conexão com o banco de dados 
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbnome);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['admin-user'];
        $senha = $_POST['admin-pass'];
    
        // Prepara o comando SQL
        $comando_banco = "SELECT * FROM admins WHERE login='$login' AND senha='$senha'";
    
        // Executa a consulta no banco de dados
        $resultado = mysqli_query($conexao, $comando_banco);
        
        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($resultado) > 0) {
            // Se existir um resultado, login bem-sucedido
            echo "<script> alert('Login bem-sucedido! Bem-vindo, $login!') </script>";
            header('Location: admin.php');
            die();
        } else {
            // Caso não haja resultados, credenciais inválidas
            echo "<script> alert('Credenciais inválidas') </script>";
        }
    }
    

?>

</body>
</html>
