<?php
include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/checkCarrinho.php';
include '../scripts/filtrarCategorias2.php'
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamikaze Radical</title>
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/cards.css">
    <link rel="stylesheet" href="../public/css/criarPasseioNav.css">
    <link rel="stylesheet" href="../public/css/categorias.css">
</head>

<body>

    <main>


<?php
if (isset($_SESSION['clienteCPF'])){
    echo "<header>

        <div class=\"logo\">
            <img src=\"./../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
            <h1 class=\"nome\">Kamikaze Radical</h1>
        </div>
        
        <nav class=\"menuNav\">
            <a href=\"./\" class=\"linkNav\">Home</a>
            <a href=\"./categorias.php\" class=\"linkNav\">Categorias</a>
            <a href=\"./carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
            <a href=\"./quemSomos.php\" class=\"linkNav\">Quem Somos</a>
            <a href=\"./historico.php\" class=\"linkNav\">Histórico</a>
            <a href=\"./../scripts/sair.php\" class=\"linkNav\">Sair</a>
        </nav>
        </header>";
} else if (isset($_SESSION['guiaCPF'])){
    echo "<header>

        <div class=\"logo\">
            <img src=\"./../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
            <h1 class=\"nome\">Kamikaze Radical</h1>
        </div>
        
        <nav class=\"menuNav\">
            <a href=\"./\" class=\"linkNav\">Home</a>
            <a href=\"./categorias.php\" class=\"linkNav\">Categorias</a>
            <a href=\"./carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
            <a href=\"./criarPasseio.php\" class=\"criarPasseioNav\">Criar Passeio</a>
            <a href=\"./quemSomos.php\" class=\"linkNav\">Quem Somos</a>
            <a href=\"./../scripts/sair.php\" class=\"linkNav\">Sair</a>
        </nav>
        </header>";
} else {
    echo "<header>

        <div class=\"logo\">
            <img src=\"./../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
            <h1 class=\"nome\">Kamikaze Radical</h1>
        </div>

        <nav class=\"menuNav\">
            <a href=\"./\" class=\"linkNav\">Home</a>
            <a href=\"./categorias.php\" class=\"linkNav\">Categorias</a>
            <a href=\"./carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
            <a href=\"./quemSomos.php\" class=\"linkNav\">Quem Somos</a>
            <a href=\"./login.php\" class=\"linkNav\">Login</a>
        </nav>
        </header>";
}
?>
<?php

echo    "<section>
            <h1 class=\"inicio\">
                Categorias
            </h1>


            <div class=\"secao\">

                            <div class=\"anuncio\">
                    <h2>Filtros:</h2>
                    <h3>
                </h3>
                </div>
                <div class=\"categorias\">
                    <form class=\"selecao\" method=\"post\" action=\"../source/categorias2.php\">
                        <fieldset class=\"subCategoria\">
                            <legend>Preço</legend>
                            <input type=\"number\" name=\"minPreco\" placeholder=\"Mínimo\" min=\"0\" class=\"filtroInput\">
                            <input type=\"number\" name=\"maxPreco\" placeholder=\"Máximo\" class=\"filtroInput\">
                        </fieldset>

                        <fieldset class=\"subCategoria\">
                            <legend>Ranking</legend>
                            <input type=\"number\" name=\"minRanking\" placeholder=\"Mínimo\" class=\"filtroInput\">
                            <input type=\"number\" name=\"maxRanking\" placeholder=\"Máximo\" class=\"filtroInput\">
                        </fieldset>

                        <fieldset class=\"subCategoria\">
                            <legend>Data</legend>
                            <label>De:</label>
                            <input type=\"date\" name=\"minData\" placeholder=\"Mínimo\" class=\"filtroInput\">
                            <label>Até:</lable>
                            <input type=\"date\" name=\"maxData\" placeholder=\"Máximo\" class=\"filtroInput\">
                        </fieldset>

                        <fieldset class=\"subCategoria\">
                            <legend>Palavras Chaves</legend>
                            <input type=\"text\" name=\"palavraChave\" placeholder=\"Digite Aqui\" class=\"filtroInput\" id=\"palavrasChaves\">
                        </fieldset>

                        <input type=\"submit\" value=\"Filtrar\" id=\"filtrarButton\">
                    </form>
                </div>

                <div class=\"anuncio\">
                    <h2>Pacotes:</h2>
                    <h3>
                </h3>
                </div>

                <div class=\"maisComprados\">";
                if ($numPasseios == 0){
                    echo "<h2>Nenhum pacote com os filtros selecionados.</h2>";
                } else {
                    foreach($cardData as $card) {
                        echo $card;
                    };
                };
            echo "</div>
        </section>
        
        <footer>
            <address>   
                R. Gen. Canabarro, 485 - Maracanã, Rio de Janeiro - RJ, 20271-204
                <a href=\"tel:+5521912345678\">Tel: (21) 91234-5678</a>
                <a href=\"mailto:contato@kamikaze.com\" class=\"txtLink\">contato@kamikaze.com</a>
            </address>
        </footer>

        
    </main>

</body>

</html>";


?>