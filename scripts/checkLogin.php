<?php
include '../enviroment.php';
include '../banco/banco.php';
session_start();

$usuarioEmail = $_POST['usuarioEmail'];

$user = $conn -> query("select * from Usuario where usuarioEmail = '$usuarioEmail'");

if (($user -> num_rows) == 1){
    $user = $user -> fetch_assoc();

    $usuarioSenha = $_POST['usuarioSenha'];
    $hashUserSenha = $user['usuarioSenha'];

    if (password_verify($usuarioSenha, $hashUserSenha)){
        $cpfUser = $user['usuarioCPF'];
        $usuarioTipo = $user['usuarioTipo'];
        if ($usuarioTipo == 'cliente') {
            $_SESSION['clienteCPF'] = $cpfUser;
            header("location: ../source/home.php");

        } else if ($usuarioTipo == 'guia') {
            $_SESSION['guiaCPF'] = $cpfUser;
            header("location: ../source/home.php");

        } else {
            echo 'Tipo de usuário inválido.';
        }
    } else {
        header("location: ../source/login.php/?login=erroEmailSenha");
    }
} else if ($num == 0) {
    header("location: ../source/login.php/?login=erroEmailSenha");
} else if ($num > 1){
    echo 'Mais de um usuário com esse email.';

}
?>