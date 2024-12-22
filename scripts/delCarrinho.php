<?php
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];
$cardDir = $queryParameters["cardDir"];

$idPasseio = $conn->query("select idPasseio from passeio where cardDir = '$cardDir'")->fetch_assoc()["idPasseio"];

if ($conn->query("delete from carrinho where idPasseio = '$idPasseio'")){
    header("location: $url/source/carrinho.php");
    exit();
}

?>