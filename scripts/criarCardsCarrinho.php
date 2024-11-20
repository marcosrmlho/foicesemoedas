<?php 
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

$clienteCPF = $_SESSION['clienteCPF'];

function getCard($imgSource, $altImg, $nome, $zIndex, $ranking, $cardDir) {
    $cardTemplate = "
    $imgSource, $altImg, $nome, $zIndex, $ranking, $cardDir
    ";
    return $cardTemplate;
}

function getCardsDataFromDB() {
    global $conn;
    global $clienteCPF;

    $cards = $conn->query("select Carrinho.idPasseio, horaInicio, dataInicio, horaFinal, dataFinal, nome, ranking, valor, imgSource, altImg, cardDir, descricao from Passeio, Carrinho where Passeio.idPasseio = Carrinho.idPasseio and clienteCPF = $clienteCPF");
    

    $cardsArray = [];
    while ($row = $cards->fetch_assoc()) {
        $cardsArray[] = $row;
    }
    return $cardsArray;
}

$zIndex = intval($conn-> query("select count(*) as numCards from carrinho where clienteCPF = $clienteCPF;")->fetch_assoc());
$cardsArray = getCardsDataFromDB();

$cardData = [];

foreach ($cardsArray as $card) {
    array_push($cardData, getCard($card['imgSource'], $card['altImg'], $card['nome'], $zIndex--, $card['ranking'], $card['cardDir']));
}
?>




<?php
/*
if ($numItensCarrinhoAux > 0){
    foreach ($cardData as $card){
        echo $card;
    }
}
                ?>*/
?>