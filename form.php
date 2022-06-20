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
include('./config.php');

#Atribuindo os valores do formulario para as vareaveis
$name = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['senha'];

#Executando a query de inserção
ExecutarQuery("INSERT INTO users(name,email,senha)VALUES('$name','$email','$senha')");

#declaração da função
function ExecutarQuery($query)
{
    try {
        $con = new mysqli(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE);
        if (!$con) {
            echo "Não possivel conectar ao banco";
            die();
        }

        $stmt = $con->prepare($query);
        if (!$stmt) {
            echo "Não possivel preparar a query";
            die();
        }

        if (!$stmt->execute()) {
            echo "erro ao executar a query";
        }
        echo "Query Executada com sucesso!.";
        die();
    } catch (Exception $e) {
        echo "não foi possivel conectar ao banco.<br>" . $e->getMessage();
    }
}
