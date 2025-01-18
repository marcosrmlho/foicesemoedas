<?php 

include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/funcoesUniversais.php';
include '../scripts/checkCarrinho.php';

$dirCar = "";
$dirCar2 = "";
$alertCar = "";

//checa se o usuario tá logado
if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "false" && !(isset($_POST['usuarioEmail']) && isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf']))) {
    $dirCar = "/..";
    $dirCar2 = "../";
    $alertCar = "<script>alert('Faça login para adicionar passeios ao carrinho.')</script>";
}
if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "tryEntry" && !(isset($_POST['usuarioEmail']) && isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf']))) {
    $dirCar = "/..";
    $dirCar2 = "../";
    $alertCar = "<script>alert('Faça login para acessar o carrinho.')</script>";
}
if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "guia" && !(isset($_POST['usuarioEmail']) && isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf']))) {
    $dirCar = "/..";
    $dirCar2 = "../";
    $alertCar = "<script>alert('Guias não podem comprar passeios.')</script>";
}
if (isset($queryParameters['login']) && $queryParameters['login'] == "erroEmailSenha" && !(isset($_POST['usuarioEmail']) && isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf']))) {
    $dirCar = "/..";
    $dirCar2 = "../";
    $alertCar = "<script>alert('Usuário e/ou senha inválido(s).')</script>";
}

echo "
<!DOCTYPE html>

<html lang=\"pt-BR\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Kamikaze Radical</title>
    <link rel=\"stylesheet\" href=\"..$dirCar/public/css/index.css\">
    <link rel=\"stylesheet\" href=\"..$dirCar/public/css/login.css\">
    <link rel=\"stylesheet\" href=\"..$dirCar/public/css/criarPasseioNav.css\">
</head>

<body>
    <main>";

    if (isset($_SESSION['clienteCPF'])){
        echo "<header>
    
            <div class=\"logo\">
                <img src=\"./..$dirCar/public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
                <h1 class=\"nome\">Kamikaze Radical</h1>
            </div>
            
            <nav class=\"menuNav\">
                <a href=\".$dirCar/\" class=\"linkNav\">Home</a>
                <a href=\".$dirCar/categorias.php\" class=\"linkNav\">Categorias</a>
                <a href=\".$dirCar/carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
                <a href=\".$dirCar/quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\".$dirCar/../scripts/sair.php\" class=\"linkNav\">Sair</a>
            </nav>
            </header>";
    } else if (isset($_SESSION['guiaCPF'])){
        echo "<header>
    
            <div class=\"logo\">
                <img src=\"./..$dirCar/public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
                <h1 class=\"nome\">Kamikaze Radical</h1>
            </div>
            
            <nav class=\"menuNav\">
                <a href=\".$dirCar/\" class=\"linkNav\">Home</a>
                <a href=\".$dirCar/categorias.php\" class=\"linkNav\">Categorias</a>
                <a href=\".$dirCar/carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
                <a href=\".$dirCar/criarPasseio.php\" class=\"criarPasseioNav\">Criar Passeio</a>
                <a href=\".$dirCar/quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\".$dirCar/../scripts/sair.php\" class=\"linkNav\">Sair</a>
            </nav>
            </header>";
    } else {
        echo "<header>
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
        </header>";
    }
echo "<section>
            <h1 class=\"inicio\">
                Login
            </h1>
            <form class=\"loginSpace\" method=\"POST\" action=\"$dirCar2../scripts/checkLogin.php\">
                <fieldset class=\"dadosUsuario\">
                <legend>Faça o login:</legend>

                <input type=\"text\" class=\"login\" name=\"usuarioEmail\" placeholder=\"Email\" required>

                <div>
                    <input type=\"password\" class=\"login\" name=\"usuarioSenha\" placeholder=\"Senha\" required>
                </div>
                </fieldset>

                <input id=\"enviarDados\" type=\"submit\" value=\"Enviar\">
                <p id=\"criarConta\">Não tem uma conta? <a href=\""?>

<?php
if ((isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "false") or (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "tryEntry") or (isset($queryParameters['login']) && $queryParameters['login'] == "erroEmailSenha")){
    echo "../criarConta.php\">";
    }
else{
echo "criarConta.php\">";
}

echo "Crie sua conta aqui!</a></p>
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
";
?>
