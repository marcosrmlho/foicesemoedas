<?php
include '../enviroment.php';
include '../banco/banco.php';

var_dump($_POST);

$minPreco = !($_POST['minPreco'] == '0' || floatval($_POST['minPreco'])) == 0 ? $_POST['minPreco']: 'null';
$maxPreco =  !($_POST['maxPreco'] == '0' || floatval($_POST['maxPreco'])) == 0 ? $_POST['maxPreco']: 'null';

$minRanking = !($_POST['minRanking'] == '0' || intval($_POST['minRanking'])) == 0 ? $_POST['minRanking']: 'null';
$maxRanking = !($_POST['maxRanking'] == '0' || intval($_POST['maxRanking'])) == 0 ? $_POST['maxRanking']: 'null';

$minData = !($_POST['minData'] == '0' || $_POST['minData']) == 0 ? $_POST['minData']: 'null';
$maxData = !($_POST['maxData'] == '0' || $_POST['maxData']) == 0 ? $_POST['maxData']: 'null';

$palavraChave = !($_POST['palavraChave'] == '0' || $_POST['palavraChave']) == 0 ? $_POST['palavraChave']: 'null';


$sqlCategoria = $conn->query("
select * from Passeio

where
valor < $maxPreco and 
valor > $minPreco and
ranking < $maxRanking and
ranking > $minRanking and
dataInicio < $maxData and
dataFinal > $minData") -> fetch_assoc();

var_dump($sqlCategoria)
?>