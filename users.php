<?php
include('./components/header.php');
?>

<section>
    <h1>Usuarios</h1>
    <!-- Formulario de cadastro META -->
    <form method="post" action="./actions/newUser.php">
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
                        <a class="btn btn-primary" href="./user.php?id=<?= $user['id'] ?>">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                        <button type="button" id="btn-Excluir-<?= $user['id'] ?>" onclick="deleteUsuario(<?= $user['id'] ?>)" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            Excluir
                        </button>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="4">Nenhum registro encontrado</td></tr>';
        }
        ?>
    </table>
    <input type="hidden" name="id" id="id" />
</section>
<script>
    function deleteUsuario(id) {
        $("#id").val(id);
        $("#btn-Excluir-"+id).prop("disabled", true);
        $("#btn-Excluir-"+id).html(`<i class="fa fa-spinner faa-spin animated"></i> 
                Excluindo...`);
        $.ajax({
            url: "./actions/deleteUser.php",
            type: "POST",
            dataType: 'json',
            data: {
                id: $("#id").val()
            },
            success: function(data) {
                alert(data.mensage);
                window.location.reload();
            },
            error: function(data) {
                alert(data.mensage);
                window.location.reload();
            },
        });
    }
</script>
<?php
include('./components/footer.php');
?>