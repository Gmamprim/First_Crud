<?php
include('config.php');

function conectar() {
    $con = new mysqli(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE);
    return $con;
}
#declaração da função
function ExecutarQuery($query): bool
{
    try {
        $con = new mysqli(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE);
        if (!$con) {
          
            return false;
        }

        $stmt = $con->prepare($query);
        if (!$stmt) {
            
            return false;
        }

        if (!$stmt->execute()) {
            return false;
        }
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function readQuery($query)
{
    #inicio do bloco try, que tenta efetuar algum processo, caso não consiga entra no bloco catch
    try {

        #inciando um novo objeto mysqli (conexão com o banco de dados)
        $con = new mysqli(HOST_NAME, USER_NAME, USER_PASSWORD, DATABASE);

        #verifica se o retorno do objeto foi um valor nulo ou falso, utilizando o operador de negação "!", 
        #caso não fosse utilizado o operado de negação ele verificaria se o valor é verdadeiro
        if (!$con) {
            $return = array("error" => "Não possivel conectar ao banco");
            return $return;
        }

        #prepara o objeto de conexão para executar a query informada atraves da chamada da função readQuery
        $stmt = $con->prepare($query);

        #verifica se o valor retornado na preparação é falso ou nulo, utilizando o operador de negação.
        #se for false entra na condição, caso contrario segue para o proximo passo da função
        if (!$stmt) {
            $return = array("error" => "Não possivel Preparar a query");
            return $return;
        }

        #Executa a query no banco de dados, e verifica se o retorno do processo é false, se for, entra na condição
        if ($stmt->execute() == false) {
            $return = array("error" => "Não possivel executar");
            return $return;
        }

        #pega o resultado da consulta
        $result = $stmt->get_result();

        #retorna os valores da consulta em um array assossiativo
        return  $result->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        $return = array("error" => $e->getMessage());
        return $return;
    }
}
