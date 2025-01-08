<?php
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';
session_start();

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];

if ($conn->query("delete from carrinho")){
    $_SESSION['agradecimento'] = "Agradecemos pela Compra!";
    header("location: $url/source/carrinho.php");
    exit();
}
?>