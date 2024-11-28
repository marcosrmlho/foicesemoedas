<?php

include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/funcoesUniversais.php';
include '../scripts/checkCarrinho.php';

$dirCar = "";
$alertCar = "";

if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "false" && !isset($_SESSION['clienteCPF'])) {
    $dirCar = "/..";
    $alertCar = "<script>alert('Faça login para adicionar passeios ao carrinho.')</script>";
}
if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "tryEntry" && !isset($_SESSION['clienteCPF'])) {
    $dirCar = "/..";
    $alertCar = "<script>alert('Faça login para acessar o carrinho.')</script>";
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
            <form>
                <input type=\"text\" class=\"login\" id=\"nome\" placeholder=\"Nome\"><br>
                <input type=\"text\" class=\"login\" id=\"usuarioCPF\" placeholder=\"CPF\"><br>
                <input type=\"text\" class=\"login\" id=\"DDD\" placeholder=\"DDD\" size=\"1\">
                <input type=\"text\" class=\"login\" id=\"UsuarioTel\" placeholder=\"Telefone\"><br>
                <input type=\"text\" class=\"login\" id=\"usuarioEmail\" placeholder=\"Email\"><br>
                <input type=\"text\" class=\"login\" id=\"usuarioSenha\" placeholder=\"Senha\">
                <input type=\"text\" class=\"login\" id=\"usuarioSenhaConf\" placeholder=\"Confirmar senha\"><br>
                <label>Quero:</label><br>
                    <input type=\"radio\" class=\"login\" id=\"guia\" name=\"usuarioTipo\" value=\"Guia\">
                    <label for=\"guia\">Criar Passeios</label><br>
                    <input type=\"radio\" class=\"login\" id=\"cliente\" name=\"usuarioTipo\" value=\"Cliente\">
                    <label for=\"cliente\">Ver Passeios</label><br>
            </form>
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

