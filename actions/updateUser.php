<?php

#incluindo o arquivo config.php        
include('./functions.php');

#Atribuindo os valores do formulario para as vareaveis
$id = $_POST['id'];
$nome = $_POST['name'];
$email = $_POST['email'];

if ($_POST['senha'] != '') {
    $senha = password_hash(strval($_POST['senha']), PASSWORD_DEFAULT);
} else {
    $senha = "";
}

#consulta se existe o email do usuario
$result = readQuery("SELECT * FROM users WHERE id='$id'");

#$result->num_rows > 0
if (!isset($result['error']) && empty($result) == false) {

    $query = "UPDATE users set nome='$nome', email='$email'" . ($senha != "" ? ", senha='$senha'" : "") . " where id='$id'";

    #Executando a query de inserção
    if (ExecutarQuery($query) == true) {

        echo '
        <script>
            alert("Registro atualizado com sucesso!");
            window.location.href = "/First_Crud/users.php";
        </script>
        ';
    } else {

        echo '
        <script>
            alert("não foi possivel efetuar a atualização do registro");
            window.location.href = "/First_Crud/users.php";
        </script>
        ';
    }
} else {
    echo "Usuario não existe.";
    die();
}
