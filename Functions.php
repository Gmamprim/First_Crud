<?php
include('./config.php');
#declaração da função
function ExecutarQuery($query): void
{
    try {
        $con = new mysqli(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE);
        if (!$con) {
            echo "Não possivel conectar ao banco";
            return;
        }

        $stmt = $con->prepare($query);
        if (!$stmt) {
            echo "Não possivel preparar a query";
            return;
        }

        if (!$stmt->execute()) {
            echo "erro ao executar a query";
        }
        echo "Query Executada com sucesso!.";
        return;
    } catch (Exception $e) {
        echo "não foi possivel conectar ao banco.<br>" . $e->getMessage();
    }
}

function readQuery($query)
{
    try {
        $con = new mysqli(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE);
        if (!$con) {
            echo "Não possivel conectar ao banco";
            return;
        }

        $stmt = $con->prepare($query);
        if (!$stmt) {
            echo "Não possivel preparar a query";
            return;
        }

        if (!$stmt->execute()) {
            echo "erro ao executar a query";
        }

        /* fetch value */
        $result = $stmt->get_result();
        return  $result->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        return "não foi possivel conectar ao banco.<br>" . $e->getMessage();
    }
}
