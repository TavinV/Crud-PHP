<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados - PJL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Cabeçalho -->
<header>
    <h1>Usuários Cadastrados</h1>
    <a href="./admin-login.php">Administração</a>
    <a href="./index.php">Cadastro</a>
</header>

<main>
    <div class="table-container">
        <h2>Lista de Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $servidor = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $dbnome = "pjldb";
                
                    // Criando a conexão com o banco de dados 
                    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbnome);
                    $comando_banco = "SELECT * FROM users";

                    //Executa a consulta SQL e armazena em uma variável
                    
                    $resultado_tabela = mysqli_query($conexao, $comando_banco);
                    
                    //Percorrer todos os registros e imprimindo na tela

                    while($linha_registro = mysqli_fetch_assoc($resultado_tabela)){
                        //Imprimindo os valores da tabema

                        echo "<tr>";
                            echo "<td>" . $linha_registro['nome'] . "</td>";
                            echo "<td>" . $linha_registro['sobrenome'] . "</td>";
                            echo "<td>" . $linha_registro['email'] . "</td>";
                            echo "<td>" . $linha_registro['telefone'] . "</td>";
                            echo "<td>" . $linha_registro['cidade'] . "</td>";
                        echo "</tr>";
                        
                    }

                    //Fechar a conexão

                    mysqli_close($conexao);    
                ?>               
            </tbody>
        </table>
    </div>
</main>

    

</body>
</html>
