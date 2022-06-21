<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Declação META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Declação Titulo -->
    <title>
        My First CRUD
    </title>

    <!-- Declação dos links -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navegação -->
    <nav class="bg-rosa text-branco">
        <ul>
            <li><a href="./index.php">home</a></li>
            <li><a href="./users.php">Usuários</a></li>
            <li><a href="./clients.php">Clientes</a></li>
        </ul>
    </nav>
    <section>
        <h1>Clientes</h1>
        <!-- Formulario de cadastro META -->
        <form method="post" action="./form.php">
            <div>
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" max="50" required>
            </div>
            <div>
                <label for="Document">Cpf ou Cnpj:</label>
                <input type="text" id="documento" name="documento" max="50" required>
            </div>
            <div>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" placeholder="(99)1234-5678" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" max="50" placeholder="123@gmail.com" required>
            </div>
            <input type="submit" value="Salvar">
        </form>

        <!-- Listagem de registros -->
        <table>

            <!-- Cabeçalho -->
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ/CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>#</th>
            </tr>

            <?php
            #inclusão do arquivo functions para o contexto
            include('./actions/functions.php');

            #chamada da função que retorna os dados da consulta no banco de dados
            $results = readQuery("SELECT * FROM clientes");

            #verifica o retorno da função
            if ($results) {
                foreach ($results as $client) {

            ?>
                    <tr>
                        <td><?php echo $client['id'] ?></td>
                        <td><?php echo $client['nome'] ?></td>
                        <td><?php echo $client['documento'] ?></td>
                        <td><?php echo $client['telefone'] ?></td>
                        <td><?php echo $client['email'] ?></td>

                        <td>#</td>
                    </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="6" style="text-align:center">Nenhum registro encontrado</td></tr>';
            }
            ?>
        </table>
    </section>
</body>

</html>