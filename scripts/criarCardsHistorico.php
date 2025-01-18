<?php 
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

$url = explode("/source", $_SERVER['REQUEST_URI'])[0];

if (isset($_SESSION['clienteCPF'])){
    $clienteCPF = $_SESSION['clienteCPF'];
    
    function getCard($imgSource, $altImg, $nome, $zIndex, $ranking, $cardDir, $valor) {
        global $url;
        $cardTemplate = "
        <div class=\"cardCarrinho\">
            <div id=\"dadosPasseio\" onclick=\"window.location.href='" . $url . "/source/passeios/mostraPasseio.php/?cardDir=" . $cardDir . "'\">" .
                "<img src=\"../public/imagens/imgPasseios/$imgSource\" alt=\"$altImg\" class=\"imgPasseio\">
                <div class=\"nomeCard\">$nome</div>
                <div>Valor:<b>$valor</b></div>
            </div>";
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
        array_push($cardData, getCard($card['imgSource'], $card['altImg'], $card['nome'], $zIndex--, $card['ranking'], $card['cardDir'], $card['valor']));
    }

} else if (isset($_SESSION['guiaCPF'])){
    $url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];
    header("location: $url/../login.php/?carrinho=guia");
    exit();
} else {
    $url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];
    header("location: $url/../login.php/?carrinho=tryEntry");
    exit();
}

?>