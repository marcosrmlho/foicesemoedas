<?php
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];

if ($conn->query("delete from carrinho")){
    $_POST["agradecimento"] = "Obrigado pela compra!";
    header("location: $url/source/carrinho.php");
    exit();
}

?>