<?php

include '../enviroment.php';
include '../banco/banco.php';

/*Lembrar de pegar esses dados no formulário de criação do passeio na parte que o guia turistico cria,
ao mesmo tempo que bota esses dados no banco de dados*/
$nome;
$descricao;
$imgSource;
$altImg;

echo "<!DOCTYPE html>

<html lang=\"pt-BR\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Kamikaze Radical</title>
    <link rel=\"stylesheet\" href=\"../../public/css/index.css\">
    <link rel=\"stylesheet\" href=\"../../public/css/passeio.css\">
</head>

<body>

    <main>


        <header>

            <div class=\"logo\">
                <img src=\"./../../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
                <h1 class=\"nome\">Kamikaze Radical</h1>
            </div>

            <nav class=\"menuNav\">
                <a href=\"./..\" class=\"linkNav\">Home</a>
                <a href=\"./../categorias.php\" class=\"linkNav\">Categorias</a>
                <a href=\"./../carrinho.php\" class=\"linkNav\">Carrinho</a>
                <a href=\"./../quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\"./../login.php\" class=\"linkNav\">Login</a>
            </nav>
        </header>


        <section class=\"sectionPasseio\">

                <div>
                    <h1 class=\"inicio\">
                        Pacote: $nomePacote
                    </h1>

                    <div class=\"secao\" id=\"secaoPasseio\">
                        <div class=\"anuncio\" id=\"anuncioPasseio\">
                            <p>
                                $descricao
                            <p>
                        </div>

                        <div class=\"imgContainer\">
                            <img src=\"./../../public/imagens/$imgSource\" alt=\"$altImg\" class=\"imgPasseio\">
                        </div>
                    </div>
                </div>

                <div class=\"secao pagamento\">
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
    <script src=\"../../public/js/final.js\"></script>
    <script src=\"../../public/js/passeio.js\"></script>
</body>

</html>";
?>