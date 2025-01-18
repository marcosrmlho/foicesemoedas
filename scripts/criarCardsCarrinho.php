<?php 
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

$url = explode("/source", $_SERVER['REQUEST_URI'])[0];

if (isset($_SESSION['clienteCPF'])){
    $clienteCPF = $_SESSION['clienteCPF'];
    
    function getCard($imgSource, $altImg, $nome, $cardDir, $idCarrinho, $valor) {
        global $url;
        $cardTemplate = "
        <div class=\"cardCarrinho\">
            <div id=\"dadosPasseio\" onclick=\"window.location.href='" . $url . "/source/passeios/mostraPasseio.php/?cardDir=" . $cardDir . "'\">" .
                "<img src=\"../public/imagens/imgPasseios/$imgSource\" alt=\"$altImg\" class=\"imgPasseio\">
                <div class=\"nomeCard\">$nome</div>
                <div>Valor: <b>$valor</b></div>
            </div>" . 
            "<button class=\"retirarDoCarrinho\" onclick=\"window.location.href='" . $url . "/scripts/delCarrinho.php/?idCarrinho=" . $idCarrinho . "'\"" . ">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
                    <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z\"/>
                    <path d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z\"/>
                </svg>
            </button>
        </div>

            ";
        return $cardTemplate;
    }

    function getCardsDataFromDB() {
        global $conn;
        global $clienteCPF;

        $cards = $conn->query("select Carrinho.idPasseio, horaInicio, dataInicio, horaFinal, dataFinal, nome, ranking, valor, imgSource, altImg, cardDir, idCarrinho, descricao from Passeio, Carrinho where Passeio.idPasseio = Carrinho.idPasseio and clienteCPF = $clienteCPF");

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
        array_push($cardData, getCard($card['imgSource'], $card['altImg'], $card['nome'], $card['cardDir'], $card['idCarrinho'], $card['valor']));
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