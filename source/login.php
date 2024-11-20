<?php

include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/funcoesUniversais.php';
include '../scripts/checkCarrinho.php';

$dirCar = "";
$alertCar = "";
if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "false") {
    $dirCar = "/..";
    $alertCar = "<script>alert('Faça login para adcionar passeios ao carrinho.')</script>";
}
echo "
<!DOCTYPE html>

<html lang=\"pt-BR\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Kamikaze Radical</title>
    <link rel=\"stylesheet\" href=\"..$dirCar/public/css/index.css\">
    <link rel=\"stylesheet\" href=\"..$dirCar/public/css/cards.css\">
</head>

<body>

    <main>


        <header>

            <div class=\"logo\">
                <img src=\"./..$dirCar/public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
                <h1 class=\"nome\">Kamikaze Radical</h1>
            </div>

            <nav class=\"menuNav\">
                <a href=\".$dirCar\" class=\"linkNav\">Home</a>
                <a href=\".$dirCar/categorias.php\" class=\"linkNav\">Categorias</a>
                <a href=\".$dirCar/carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
                <a href=\".$dirCar/quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\".$dirCar/login.php\" class=\"linkNav\">Login</a>
            </nav>
        </header>


        <section>
            <h1 class=\"inicio\">
                Login
            </h1>
        </section>

        <footer>
            <address>   
                R. Gen. Canabarro, 485 - Maracanã, Rio de Janeiro - RJ, 20271-204
                <a href=\"tel:+5521912345678\">Tel: (21) 91234-5678</a>
                <a href=\"mailto:contato@kamikaze.com\" class=\"txtLink\">contato@kamikaze.com</a>
            </address>
        </footer>

        
    </main>
    $alertCar
</body>

</html>
"
?>

