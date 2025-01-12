<?php
include '../enviroment.php';
include '../banco/banco.php';
session_start();

if (isset($_SESSION['clienteCPF']) || isset($_SESSION['guiaCPF'])){
    session_unset();
    header("location: ./../source/home.php");
} else {
    echo 'Usuário não está logado para sair do sistema.';
}
?>