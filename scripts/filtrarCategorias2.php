<?php
include '../enviroment.php';
include '../banco/banco.php';


$minPreco = !($_POST['minPreco'] == '0' || floatval($_POST['minPreco'])) == 0 ? $_POST['minPreco']: 'null';
$maxPreco =  !($_POST['maxPreco'] == '0' || floatval($_POST['maxPreco'])) == 0 ? $_POST['maxPreco']: 'null';

$minRanking = !($_POST['minRanking'] == '0' || intval($_POST['minRanking'])) == 0 ? $_POST['minRanking']: 'null';
$maxRanking = !($_POST['maxRanking'] == '0' || intval($_POST['maxRanking'])) == 0 ? $_POST['maxRanking']: 'null';

$minData = !($_POST['minData'] == '0' || $_POST['minData']) == 0 ? $_POST['minData']: 'null';
$maxData = !($_POST['maxData'] == '0' || $_POST['maxData']) == 0 ? $_POST['maxData']: 'null';

$palavraChave = !($_POST['palavraChave'] == '0' || $_POST['palavraChave']) == 0 ? $_POST['palavraChave']: 'null';

if ($minPreco == 'null'){
    $minPreco = 0.00;
}
if($maxPreco == 'null'){
    $maxPreco = 9999999999.00;
}
if($maxRanking == "null"){
    $maxRanking = 99;
}
if($minRanking == "null"){
    $minRanking = 0;
}
if($maxData == "null"){
    $maxData = "2100-12-30";
}
if($minData == "null"){
    $minData = "0001-01-01";
}
if($palavraChave == "null"){
    $palavraChave = "";
}


$sqlCategoria = "
select * from Passeio

where
valor <= $maxPreco and 
valor >= $minPreco and
ranking <= $maxRanking and
ranking >= $minRanking and
dataInicio <= '$maxData' and
dataFinal >= '$minData' and
(nome like '%$palavraChave%' or descricao like '%$palavraChave%')";

$passeios = $conn->query($sqlCategoria);

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

function getPaginatedPasseiosDataFromDB($sqlCategoria) {
    global $conn;
    $passeios = $conn->query($sqlCategoria);
    
    // Transformar o resultado em um array para poder ordená-lo
    $passeiosArray = [];
    while ($row = $passeios->fetch_assoc()) {
        $passeiosArray[] = $row;
    }
    return $passeiosArray;
}

$zIndex = 300;
$pageSize = 9;

$passeiosArray = getPaginatedPasseiosDataFromDB($sqlCategoria);

$cardData = [];

$paginasTotais = $conn-> query("select count(*) as numPasseios from passeio where valor <= $maxPreco and 
valor >= $minPreco and
ranking <= $maxRanking and
ranking >= $minRanking and
dataInicio <= '$maxData' and
dataFinal >= '$minData' and (nome like '%$palavraChave%' or descricao like '%$palavraChave%')")->fetch_assoc();
$numPasseios = intval($paginasTotais["numPasseios"]);
$paginasTotais = ceil($numPasseios/$pageSize);

foreach ($passeiosArray as $passeio) {
    array_push($cardData, getCard($passeio['imgSource'], $passeio['altImg'], $passeio['nome'], $zIndex--, $passeio['ranking'], $passeio['cardDir']));
}


?>