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
        <h1>Edição de Usuario</h1>

        <?php
        #inclusão do arquivo functions para o contexto
        include('./actions/functions.php');

        $id = $_GET['id'];

        #chamada da função que retorna os dados da consulta no banco de dados
        $results = readQuery("SELECT * FROM users WHERE id='$id'");


        #verifica o retorno da função
        if (!isset($results['error']) && empty($results) == false) {
            $user = $results[0];
        ?>

            <!-- Formulario de cadastro META -->
            <form method="post" action="./actions/updateUser.php" id="updateUser">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />

                <div class="d-flex">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" id="name" name="name" max="50" required value="<?php echo $user['nome']; ?>">
                </div>
                <div class="d-flex">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" max="50" placeholder="123@gmail.com" value="<?php echo $user['email']; ?>">
                </div>
                <div class="d-flex">
                    <label for="senha" class="form-label">nova senha:</label>
                    <input type="password" id="senha" name="senha">
                </div>
                <button type="submit" class="">Salvar</button>
            </form>
        <?php
        } else if (isset($results['error'])) {
            echo $results['error'];
        } else {
            echo "registro não entrado";
        }
        ?>

    </section>
    <script>

        let form = document.getElementById('updateUser');

        form.addEventListener('submit', function(e) {

        });
    </script>
</body>

</html>