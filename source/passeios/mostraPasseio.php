<?php

include '../../enviroment.php';
include '../../banco/banco.php';
include '../../scripts/funcoesUniversais.php';

$cardDir = $queryParameters['cardDir'];
$queryPasseio = $conn->query("select * from passeio where cardDir='$cardDir'")->fetch_assoc();

$horaInicio = explode(":", $queryPasseio["horaInicio"]);
$horaInicio = $horaInicio[0] . "h" . $horaInicio[1];

$dataInicio = explode("-", $queryPasseio["dataInicio"]);
$dataInicio = $dataInicio[2] . "/" . $dataInicio[1] . "/" . $dataInicio[0];

$horaFinal = explode(":", $queryPasseio["horaFinal"]);
$horaFinal = $horaFinal[0] . "h" . $horaFinal[1];

$dataFinal = explode("-", $queryPasseio["dataFinal"]);
$dataFinal = $dataFinal[2] . "/" . $dataFinal[1] . "/" . $dataFinal[0];

$nome = $queryPasseio["nome"];
$ranking = $queryPasseio["ranking"];
$valor = str_replace(".",",", $queryPasseio["valor"]);
$imgSource = $queryPasseio["imgSource"];
$altImg = $queryPasseio["altImg"];
$descricao = $queryPasseio["descricao"];

session_start();

echo "
<!DOCTYPE html>

<html lang=\"pt-BR\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Kamikaze Radical</title>
    <link rel=\"stylesheet\" href=\"../../../public/css/index.css\">
    <link rel=\"stylesheet\" href=\"../../../public/css/passeio.css\">
</head>

<body>

    <main>


        <header>

            <div class=\"logo\">
                <img src=\"./../../../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
                <h1 class=\"nome\">Kamikaze Radical</h1>
            </div>

            <nav class=\"menuNav\">
                <a href=\"./../../\" class=\"linkNav\">Home</a>
                <a href=\"./../../categorias.php\" class=\"linkNav\">Categorias</a>
                <a href=\"./../../carrinho.php\" class=\"linkNav\">Carrinho</a>
                <a href=\"./../../quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\"./../../login.php\" class=\"linkNav\">Login</a>
            </nav>
        </header>


        <section class=\"sectionPasseio\">

                <div>
                    <div class=\"infoInicio\">
                        <h1 class=\"inicio\">
                            Pacote: $nome
                        </h1>
                        <h1 class=\"inicio\">
                            Ranking: $ranking
                        </h1>
                    </div>


                    <div class=\"secao\" id=\"secaoPasseio\">
                        <div class=\"anuncio\" id=\"anuncioPasseio\">
                            <h2>Descrição do passeio:</h2>
                            <p>
                                $descricao
                            <p>
                        </div>

                        <div class=\"imgContainer\">
                            <img src=\"./../../../public/imagens/$imgSource\" alt=\"$altImg\" class=\"imgPasseio\">
                        </div>
                    </div>
                </div>

                <div class=\"pagamento\">
                    <div class=\"preco\"><p>Preço: <b>R$ $valor</b></p></div>
                    <p>Hora e data de início do passeio: às <b>$horaInicio</b> do dia <b>$dataInicio</b></p>
                    <p>Hora e data de encerramento do passeio: às <b>$horaFinal</b> do dia <b>$dataFinal</b></p>
                    <button id=\"addCarrinho\">Adcionar ao Carrinho</button>
                </div>

        </section>

        <footer>
            <address>   
                R. Gen. Canabarro, 485 - Maracanã, Rio de Janeiro - RJ, 20271-204
                <a href=\"tel:+5521912345678\">Tel: (21) 91234-5678</a>
                <a href=\"mailto:contato@kamikaze.com\" class=\"txtLink\">contato@kamikaze.com</a>
            </address>
        </footer>

        
    </main>
    <script>
        var cardDir = \"$cardDir\"
    </script>
    <script src=\"../../../public/js/final.js\"></script>
    <script src=\"../../../public/js/passeio.js\"></script>
</body>

</html>
"
?>

