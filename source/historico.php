<?php
include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/checkCarrinho.php';
include '../scripts/checkHistorico.php';
include '../scripts/criarCardsHistorico.php';

if ($numItensHistoricoAux > 0){
    $numPacotes = "Seu Histórico de Compras:";
} else {
     $numPacotes = "Você não tem um Histórico de Compras.";
}

echo "
<!DOCTYPE html>
<html lang=\"pt-BR\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Kamikaze Radical</title>
    <link rel=\"stylesheet\" href=\"../public/css/index.css\">
    <link rel=\"stylesheet\" href=\"../public/css/carrinho.css\">
    <link rel=\"stylesheet\" href=\"../public/css/criarPasseioNav.css\">
</head>
<body>
    <main>";

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
                <a href=\"./carrinho.php\" class=\"linkNav\">Carrinho<?php echo $numItensCarrinho?></a>
                <a href=\"./criarPasseio.php\" class=\"linkNav\">Criar Passeio</a>
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
                <a href=\"./carrinho.php\" class=\"linkNav\">Carrinho<?php echo $numItensCarrinho?></a>
                <a href=\"./quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\"./login.php\" class=\"linkNav\">Login</a>
            </nav>
            </header>";
    };

echo "<section>
            <h1 class=\"inicio\">
                Histórico
            </h1>

            <div class=\"secao\">
                <div class=\"anuncio\">
                    <h2>
                        $numPacotes
                    </h2>
                </div>";
?>

<?php
echo "<div class=\"containerCard\">";

if ($numItensHistoricoAux > 0) {
    foreach ($cardData as $card) {
        echo $card;
    }
} else {
    echo "<p id=\"carrinhoVazio\">Você não possui Histórico de Compras.</p>";
};

echo "</div>";
?>

<?php
echo "

            </div>
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
</body>
</html>";
?>