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
    <nav>
        <ul>
            <li><a href="./index.php">home</a></li>
            <li><a href="./users.php">Usuários</a></li>
            <li><a href="./clients.php">Clientes</a></li>
        </ul>
    </nav>
    <section>
        <h1>Usuarios</h1>
        <!-- Formulario de cadastro META -->
        <form method="post" action="./form.php">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" max="50" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" max="50" placeholder="123@gmail.com" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <input type="submit" value="Salvar">
        </form>

        <!-- Listagem de registros -->
        <table>

            <!-- Cabeçalho -->
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>#</th>
            </tr>

            <?php
            #inclusão do arquivo functions para o contexto
            include('./actions/functions.php');

            #chamada da função que retorna os dados da consulta no banco de dados
            $results = readQuery("SELECT * FROM users");

            #verifica o retorno da função
            if ($results) {

                #Loop de repetição para listar todos os registros encontrados

                /*$i = 0;
                while (empty($results[$i]) == false) {*/
                /*

                for ($i = 0; empty($results[$i]) == false; $i++) {
                    $user = $results[$i];
                    */

                foreach ($results as $user) {

            ?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['nome'] ?></td>
                        <td>
                            <?php
                                echo $user['email'];
                            ?>

                        </td>
                        <td>
                            <a href="./user.php?id=<?=$user['id'] ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="4">Nenhum registro encontrado</td></tr>';
            }
            ?>
        </table>
    </section>
</body>

</html>