<?php
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';
session_start();

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];

$cpfCliente = $_SESSION['clienteCPF'];
$dataAtual = date('Y-m-d');
$passeiosCarrinho = $conn -> query("select idPasseio from carrinho where clienteCPF = '$cpfCliente'");
$numPasseiosCarrinho = $passeiosCarrinho -> num_rows;

for($i = 0; $i < $numPasseiosCarrinho; $i++){
    $idPass = ($passeiosCarrinho -> fetch_assoc())['idPasseio'];
    if ($conn -> query("insert into Comprar (clienteCPF, idPasseio, dataCompra) values ('$cpfCliente', $idPass, '$dataAtual')")){
    };
};

if ($conn->query("delete from carrinho")){
    $_SESSION['agradecimento'] = "Agradecemos pela Compra!";
    header("location: $url/source/carrinho.php");
    exit();
}
?>