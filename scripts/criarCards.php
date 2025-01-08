<?php 
include '../enviroment.php';
include './../banco/banco.php';
include 'funcoesUniversais.php';

function getCard($imgSource, $altImg, $nome, $zIndex, $ranking, $cardDir) {
    $cardTemplate = "
        <div class=\"cardWrapper\" style=\"z-index: $zIndex;\" onclick=\"window.location='./passeios/mostraPasseio.php/?cardDir=$cardDir';\">
            <div class=\"card\">
                <img src=\"../public/imagens/imgPasseios/$imgSource\" alt=\"$altImg\">
                <div class=\"cardDescricao\">
                    <div class=\"descricao\">
                        $nome
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

$ordenacaoAtual = array_key_exists("ordenacao",$queryParameters) && $queryParameters["ordenacao"] != NULL ? $queryParameters["ordenacao"] : null;
$currentPage = array_key_exists("page",$queryParameters) && $queryParameters["page"] != NULL ? intval($queryParameters["page"]) : 0;
$passeiosArray = getPaginatedPasseiosDataFromDB($currentPage, $pageSize, $ordenacaoAtual);

$cardData = [];

$paginasTotais = $conn-> query("select count(*) as numPasseios from passeio;")->fetch_assoc();
$numPasseios = intval($paginasTotais["numPasseios"]);
$paginasTotais = ceil($numPasseios/$pageSize);

foreach ($passeiosArray as $passeio) {
    array_push($cardData, getCard($passeio['imgSource'], $passeio['altImg'], $passeio['nome'], $zIndex--, $passeio['ranking'], $passeio['cardDir']));
}

?>