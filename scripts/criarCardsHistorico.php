<?php 
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

$url = explode("/source", $_SERVER['REQUEST_URI'])[0];

if (isset($_SESSION['clienteCPF'])){
    $clienteCPF = $_SESSION['clienteCPF'];
    
    function getCard($imgSource, $altImg, $nome, $zIndex, $ranking, $cardDir, $valor, $dataCompra) {
        global $url;
        $cardTemplate = "
        <div class=\"cardCarrinho\">
            <div id=\"dadosPasseio\" onclick=\"window.location.href='" . $url . "/source/passeios/mostraPasseio.php/?cardDir=" . $cardDir . "'\">" .
                "<img src=\"../public/imagens/imgPasseios/$imgSource\" alt=\"$altImg\" class=\"imgPasseio\">
                <div class=\"nomeCard\">$nome</div>
                <div>Valor: <b>$valor</b></div>
                <div>Data da Compra: <b>$dataCompra</b></div>
            </div>
        </div>";
        return $cardTemplate;
    }

    function getCardsDataFromDB() {
        global $conn;
        global $clienteCPF;

        $cards = $conn->query("select Comprar.idPasseio, Comprar.dataCompra, horaInicio, dataInicio, horaFinal, dataFinal, nome, ranking, valor, imgSource, altImg, cardDir, descricao from Passeio, Comprar where Passeio.idPasseio = Comprar.idPasseio and clienteCPF = $clienteCPF");

        $cardsArray = [];
        while ($row = $cards->fetch_assoc()) {
            $cardsArray[] = $row;
        }
        return $cardsArray;
    }

    $zIndex = intval($conn-> query("select count(*) as numCards from Comprar where clienteCPF = $clienteCPF;")->fetch_assoc());
    $cardsArray = getCardsDataFromDB();
    $cardData = [];

    foreach ($cardsArray as $card) {
        $data = explode("-", $card['dataCompra']);
        $data = $data[2] . "/" . $data[1] . "/" . $data[0];
        array_push($cardData, getCard($card['imgSource'], $card['altImg'], $card['nome'], $zIndex--, $card['ranking'], $card['cardDir'], $card['valor'], $data));
    }

} else if (isset($_SESSION['guiaCPF'])){
    $url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];
    header("location: $url/../login.php/?historico=guia");
    exit();
} else {
    $url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];
    header("location: $url/../login.php/?historico=tryEntry");
    exit();
}

?>