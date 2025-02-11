<?php 
     $servidor = "localhost";
     $usuario = "root";
     $senha = "";
     $dbnome = "pjldb";
     
     // Criando a conexão com o banco de dados 
     $conexao = mysqli_connect($servidor, $usuario, $senha, $dbnome);
     $comando_banco = "SELECT * FROM users";

     echo "<script>alert('POST')</script>";
     if($_SERVER["REQUEST_METHOD"] == "POST"){
         if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $cidade = $_POST['cidade'];

            // Prepara e executa a consulta DELETE
            $comando_banco = "UPDATE users SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', email='$email', cidade='$cidade' WHERE id='$id'";
    
            if (mysqli_query($conexao, $comando_banco)) {
                // Redireciona para admin.php com uma mensagem de sucesso
                echo "<script>alert('Usuário $nome atualizado!')</script>";
                header('Location: admin.php');
            } else {
                echo "<script>alert('Erro ao atualizar o usuario!'); window.location.href='admin.php';</script>";
            }
        } else {
            echo "<script>alert('ID não fornecido.'); window.location.href='admin.php';</script>";
        }

     }
?>