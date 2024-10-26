<?php
function getCard($imgSource, $altImg, $descricao, $zIndex, $ranking, $cardDir) {
    $cardTemplate = "
        <div class=\"cardWrapper\" style=\"z-index: $zIndex;\" onclick=\"window.location='../static/passeios/$cardDir.php';\">
            <div class=\"card\">
                <img src=\"passeios/$imgSource\" alt=\"$altImg\">
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
};
$cardData = [];
include 'banco/banco.php';

$zIndex = 2000;

$passeios = $conn -> query('Select * from Passeios');

sort($passeios);
foreach($passeios as $passeio){
    array_push($cardData ,getCard("$passeio[8]", "$passeio[9]", "$passeio[5]", $zIndex--, "$passeio[6]", "$passeio[10]"));
};

/*$cardData = [
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", $zIndex--, "8", "cardAsaDelta")
];*/
?>