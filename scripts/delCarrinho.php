<?php
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];
$idCarrinho = $queryParameters["idCarrinho"];

if ($conn->query("delete from carrinho where idCarrinho = '$idCarrinho'")){
    echo "oi";
    header("location: $url/source/carrinho.php");
    exit();
}

?>