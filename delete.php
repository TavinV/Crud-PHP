<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbnome = "pjldb";
    
    // Criando a conexão com o banco de dados 
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbnome);

    // Verifica se o ID foi passado via POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prepara e executa a consulta DELETE
        $comando_banco = "DELETE FROM users WHERE id = $id";

        if (mysqli_query($conexao, $comando_banco)) {
            // Redireciona para admin.php com uma mensagem de sucesso
            echo "<script>alert('Registro excluído com sucesso!')</script>";
            header('Location: admin.php');
        } else {
            echo "<script>alert('Erro ao excluir o registro!'); window.location.href='admin.php';</script>";
        }
    } else {
        echo "<script>alert('ID não fornecido.'); window.location.href='admin.php';</script>";
    }

    // Fechar a conexão
    mysqli_close($conexao);
?>