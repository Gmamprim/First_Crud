<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        My First CRUD
    </title>
</head>

<body>
    <form method="post" action="./form.php">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" max="50" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" max="50" placeholder="123@gmail.com" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <input type="submit" value="Submit">

    </form>
    <table>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>#</th>
            </tr>
            <?php
            include('./functions.php');
            $results = readQuery("SELECT * FROM users");


            if ($results) {
                foreach ($results as $user) {
                   ?>
                    <tr>
                        <th><?php echo $user['id'] ?></th>
                        <th><?php echo $user['name'] ?></th>
                        <th><?php echo $user['email'] ?></th>
                        <th>#</th>
                    </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="4">Nenhum registro encontrado</td></tr>';
            }
            ?>

        </table>

    </table>
</body>

</html>