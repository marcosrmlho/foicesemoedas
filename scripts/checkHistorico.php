<?php

session_start();

$numItensHistorico = "";

if (isset($_SESSION['clienteCPF'])){

    $clienteCPF = $_SESSION['clienteCPF'];
    $historicoSQL = $conn->query("select * from comprar where clienteCPF = $clienteCPF");
    $numItensHistorico = $historicoSQL->num_rows;
    $numItensHistoricoAux = $numItensHistorico;
    if ($numItensHistorico > 0){
        $numItensHistorico = " ($numItensHistorico)";
    }
    else{
        $numItensHistorico = "";
    };
}

?>