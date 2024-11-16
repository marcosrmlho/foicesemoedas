<?php 
include './../banco/banco.php';
$numberOfElementsPerPage = 9; 

function getCard($imgSource, $altImg, $descricao, $zIndex, $ranking, $cardDir) {
    $cardTemplate = "
        <div class=\"cardWrapper\" style=\"z-index: $zIndex;\" onclick=\"window.location='./passeios/$cardDir.php';\">
            <div class=\"card\">
                <img src=\"../public/imagens/$imgSource\" alt=\"$altImg\">
                <div class=\"cardDescricao\">
                    <div class=\"descricao\">
                        $descricao
                    </div>
                    <div class=\"ranking\">
                        Ranking: <b>$ranking</b>
                    </div>
                </div>
            </div>
        </div>
    ";
    return $cardTemplate;
}


function getQueryParameters() {
    $queriesString = explode("&", $_SERVER['QUERY_STRING']);
    $queryResults = [];
    foreach ($queriesString as $query) {
        $query = trim($query);
        $queryResult = explode('=', $query);

        if ($queryResult != NULL && array_key_exists("0",$queryResult) && $queryResult[0] != NULL && array_key_exists("1",$queryResult) && $queryResult[1] != NULL){
            $queryResults[$queryResult[0]] = $queryResult[1];
        }
    }
    return $queryResults;
}

function getPaginatedPasseiosDataFromDB($page, $pageSize, $ordenacao) {
    global $conn;
    $skip = $pageSize * $page;
    $take = $pageSize;

    if ($ordenacao == null){
        $ordenacao = "";
    } else {
    if ($ordenacao == "data"){
        $ordenacao = "order by dataInicio asc";
    } else {
    if ($ordenacao == "ranking"){
        $ordenacao = "order by ranking desc";
    }}
    }
    
    $passeios = $conn->query("select * from Passeio $ordenacao limit $take offset $skip");
    
    // Transformar o resultado em um array para poder ordená-lo
    $passeiosArray = [];
    while ($row = $passeios->fetch_assoc()) {
        $passeiosArray[] = $row;
    }
    return $passeiosArray;
}

$zIndex = 9;
$pageSize = 9;

$queryParameters = getQueryParameters();

$ordenacaoAtual = array_key_exists("ordenacao",$queryParameters) && $queryParameters["ordenacao"] != NULL ? $queryParameters["ordenacao"] : null;

$currentPage = array_key_exists("page",$queryParameters) && $queryParameters["page"] != NULL ? intval($queryParameters["page"]) : 0;

$passeiosArray = getPaginatedPasseiosDataFromDB($currentPage, $pageSize, $ordenacaoAtual);

$cardData = [];

foreach ($passeiosArray as $passeio) {
    array_push($cardData, getCard($passeio['imgSource'], $passeio['altImg'], $passeio['nome'], $zIndex--, $passeio['ranking'], $passeio['cardDir']));
}

?>