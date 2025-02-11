<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa - PJL</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos para os pop-ups */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 20px 100px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .popup button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .confirm-btn {
            background-color: red;
            color: white;
        }

        .close-btn {
            background-color: gray;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>PJL - Área Administrativa</h1>
    <a href="./usuarios.php">Lista de Usuarios</a>
</header>

<main>
    <div class="table-container">
        <h2>Registros de Clientes</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                    <th>Ações</th>
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
                    
                    // Executa a consulta SQL e armazena em uma variável
                    $resultado_tabela = mysqli_query($conexao, $comando_banco);
                    
                    // Percorrer todos os registros e imprimindo na tela
                    while ($linha_registro = mysqli_fetch_assoc($resultado_tabela)) {
                        // Imprimindo os valores da tabela
                        $nome = $linha_registro['nome'];
                        $sobrenome = $linha_registro['sobrenome'];
                        $email = $linha_registro['email'];
                        $telefone = $linha_registro['telefone'];
                        $cidade = $linha_registro['cidade'];
                        $id = $linha_registro['id'];  // Supondo que a tabela tenha um campo 'id'
                    
                        echo "<tr>";
                        echo "<td>" . $nome . "</td>";
                        echo "<td>" . $sobrenome . "</td>";
                        echo "<td>" . $email . "</td>";
                        echo "<td>" . $telefone . "</td>";
                        echo "<td>" . $cidade . "</td>";
                        
                        // Botão de Editar
                        echo "<td>";
                        echo "<button class=\"edit-btn\" onclick=\"openEditPopup('$nome', '$sobrenome', '$email', '$telefone', '$cidade', '$id')\">Editar</button>";
                        echo "<button class=\"delete-btn\" onclick=\"openDeletePopup('$nome $sobrenome', $id)\">Excluir</button>";
                        echo "</td>";
                
                        echo "</tr>";
                    }
                    
                    //Fechar a conexão

                    mysqli_close($conexao);    
                ?>               
            </tbody>
        </table>
    </div>
</main>

<!-- Modal de Edição -->
<div id="edit-popup" class="popup">
    <div class="popup-content">
        <h3>Editar Cadastro</h3>
        <form id="edit-form" action="update.php" method="POST">
            <input style="display: none" type="text" id="edit-id" name="id">
            <div class="form-group">
                <label for="edit-nome">Nome</label>
                <input type="text" id="edit-nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="edit-nome">Sobrenome</label>
                <input type="text" id="edit-sobrenome" name="sobrenome" required>
            </div>
            <div class="form-group">
                <label for="edit-email">E-mail</label>
                <input type="email" id="edit-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="edit-telefone">Telefone</label>
                <input type="tel" id="edit-telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="edit-cidade">Cidade</label>
                <input type="text" id="edit-cidade" name="cidade" required>
            </div>
            <button type="submit">Salvar Alterações</button>
            <button type="button" class="close-btn" onclick="closeEditPopup()">Fechar</button>
        </form>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div id="delete-popup" class="popup">
    <div class="popup-content">
        <h3>Confirmar Exclusão</h3>
        <p>Tem certeza de que deseja excluir <span id="delete-nome"></span>?</p>
        <form id="delete-form" method="POST" action="delete.php">
            <input type="hidden" id="delete-id" name="id">
            <button type="submit" class="confirm-btn">Confirmar</button>
            <button type="button" class="close-btn" onclick="closeDeletePopup()">Cancelar</button>
        </form>
    </div>
</div>

<script>
    function openEditPopup(nome, sobrenome, email, telefone, cidade, id) {
        document.getElementById('edit-nome').value = nome;
        document.getElementById('edit-sobrenome').value = sobrenome;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-telefone').value = telefone;
        document.getElementById('edit-cidade').value = cidade;
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-popup').style.display = 'flex';
    }

    function closeEditPopup() {
        document.getElementById('edit-popup').style.display = 'none';
    }

    function openDeletePopup(nome, id) {
        document.getElementById('delete-nome').textContent = nome;
        document.getElementById('delete-id').value = id;
        document.getElementById('delete-popup').style.display = 'flex';
    }

    function closeDeletePopup() {
        document.getElementById('delete-popup').style.display = 'none';
    }
</script>

</body>
</html>
