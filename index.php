<?php

function conectarBancoDeDados()
{
}
?>
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
    <pre>
        <?php
        /*
            // ou # para comentar
            $ para declarar vareavel
            = para atribuir valor
            == para fazer comparações exatas
            != para comparações diferentes
            || alternativas
            &&
        */
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
        }
        ?>
    </pre>
</body>

</html>