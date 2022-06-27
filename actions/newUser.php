<?php

/*
            // ou # para comentar
            $ para declarar vareavel
            = para atribuir valor
            == para fazer comparações exatas
            != para comparações diferentes
            || alternativas
            &&
        
        $x = 1;
        $y = 0;

        if ($x == $y && $x > 0) {
            echo "X é igual a Y e maior que 0";
        } else  if ($x == $y && $x == 0) {
            echo "X é igual a Y e X é igual a 0";
        } else if ($x == $y || $x >= 1) {
            echo "X é igual a Y ou X é maior ou igual a 1";
        } else {
            echo "nenhuma das validações anteriores";
        }*/

#incluindo o arquivo config.php        
include('./functions.php');

#Atribuindo os valores do formulario para as vareaveis
$name = $_POST['name'];
$email = $_POST['email'];
$senha = password_hash(strval($_POST['senha']), PASSWORD_DEFAULT);

#consulta se existe o email do usuario
$result = readQuery("SELECT * FROM users WHERE email='$email'");
#$result->num_rows > 0
if ($result) {
    echo "já existe um usuario cadastrado com o email informado.";
    die();
}


#Executando a query de inserção
ExecutarQuery("INSERT INTO users(nome,email,senha)VALUES('$name','$email','$senha')");

header('Location: ../users.php');
