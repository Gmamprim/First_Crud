<?php

#incluindo o arquivo config.php        
include('functions.php');
if (!isset($_SESSION)) {
    session_start();
}
$_SESSION['error_login'] = "";

$email = $_POST['email'];
$senha = $_POST['password'];

$usuario = readQuery("SELECT * FROM users WHERE email='$email'");
$usuario = $usuario[0];
if ($usuario) {

    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['user'] = [
            "name" => $usuario['senha'],
            "id" => $usuario['id']
        ];
        header('Location: ../index.php');
    } else {
        $_SESSION['error_login'] = "Email ou senha inválido";
        header('Location: ../login.php');
    }
} else {
    $_SESSION['error_login'] = "Email ou senha inválido";
    header('Location: ../login.php');
}
