<?php

session_start();

$numItensCarrinho = "";

if (isset($_SESSION['clienteCPF'])){

    $clienteCPF = $_SESSION['clienteCPF'];
    $carrinhoSQL = $conn->query("select * from carrinho where clienteCPF = $clienteCPF");
    $numItensCarrinho = $carrinhoSQL->num_rows;
    $numItensCarrinhoAux = $numItensCarrinho;
    if ($numItensCarrinho > 0){
        $numItensCarrinho = " ($numItensCarrinho)";
    }
    else{
        $numItensCarrinho = "";
    };
}

?>