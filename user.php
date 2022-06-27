<?php
include('./components/header.php');
?>

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
            <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>" />

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
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check-circle"></i>
                Salvar
            </button>

            <button type="button" id="btn-Excluir" class="btn btn-danger">
                <i class="fa fa-trash"></i>
                Excluir
            </button>
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
    $("#btn-Excluir").click(function() {
        $("#btn-Excluir").prop("disabled", true);
        $("#btn-Excluir").html(`<i class="fa fa-spinner faa-spin animated"></i> 
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
            },
            error: function(data) {
                alert(data.mensage);
            },
        });
    });
</script>

<?php include('./components/footer.php'); ?>