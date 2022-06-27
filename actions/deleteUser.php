<?php
include('./Functions.php');

$id = $_REQUEST['id'];

if (ExecutarQuery("DELETE FROM users WHERE id = $id")) {
    echo json_encode(array("mensage" => "Registro excluido com sucesso"));
}else {
    echo json_encode(array("mensage" => "Não foi possivel excluir o registro"));
}

