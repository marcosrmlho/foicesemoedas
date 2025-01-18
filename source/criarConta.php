<?php 

include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/funcoesUniversais.php';
include '../scripts/checkCarrinho.php';


$dirCar = "";
$alertCar = "";

// Checa se o usuário está logado
if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "false" && !(isset($_POST['nome']) && isset($_POST['usuarioCPF']) && isset($_POST['usuarioCPF']) && isset($_POST['usuarioEmail'])
&& isset($_POST['DDD']) && isset($_POST['usuarioTel']) && isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf'])
&& isset($_POST['usuarioTipo']) && !isset($_SESSION['clienteCPF']))) {
    $dirCar = "/..";
    $alertCar = "<script>alert('Faça login para adicionar passeios ao carrinho.')</script>";
}
if (isset($queryParameters['carrinho']) && $queryParameters['carrinho'] == "tryEntry" && !(isset($_POST['nome']) && isset($_POST['usuarioCPF']) && isset($_POST['usuarioCPF']) && isset($_POST['usuarioEmail'])
&& isset($_POST['DDD']) && isset($_POST['usuarioTel']) && isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf'])
&& isset($_POST['usuarioTipo']) && !isset($_SESSION['clienteCPF']))) {
    $dirCar = "/..";
    $alertCar = "<script>alert('Faça login para acessar o carrinho.')</script>";
}
if (isset($queryParameters['criarConta']) && $queryParameters['criarConta'] == "emailExistente" && !(isset($_POST['nome']) && isset($_POST['usuarioCPF']) && isset($_POST['usuarioCPF']) && isset($_POST['usuarioEmail'])
&& isset($_POST['DDD']) && isset($_POST['usuarioTel']) && isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf'])
&& isset($_POST['usuarioTipo']))) {
    $dirCar = "/..";
    $alertCar = "<script>alert('Email já está cadastrado no sistema.')</script>";
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
    <link rel=\"stylesheet\" href=\"../$dirCar/css/criarPasseioNav.css\">
</head>

<body>
    <main>";
    if (isset($_SESSION['clienteCPF'])){
        echo "<header>
    
            <div class=\"logo\">
                <img src=\".$dirCar/../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
                <h1 class=\"nome\">Kamikaze Radical</h1>
            </div>
            
            <nav class=\"menuNav\">
                <a href=\".$dirCar/\" class=\"linkNav\">Home</a>
                <a href=\".$dirCar/categorias.php\" class=\"linkNav\">Categorias</a>
                <a href=\".$dirCar/carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
                <a href=\".$dirCar/quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\".$dirCar/historico.php\" class=\"linkNav\">Histórico</a>
                <a href=\".$dirCar/../scripts/sair.php\" class=\"linkNav\">Sair</a>
            </nav>
            </header>";
    } else if (isset($_SESSION['guiaCPF'])){
        echo "<header>
    
            <div class=\"logo\">
                <img src=\".$dirCar/../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
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
                <img src=\".$dirCar/../public/imagens/designKamikaze.svg\" alt=\"Logomarca Kamikaze Radical\" height=\"200px\" width=\"200px\" id=\"design\">
                <h1 class=\"nome\">Kamikaze Radical</h1>
            </div>
    
            <nav class=\"menuNav\">
                <a href=\".$dirCar/\" class=\"linkNav\">Home</a>
                <a href=\".$dirCar/categorias.php\" class=\"linkNav\">Categorias</a>
                <a href=\".$dirCar/carrinho.php\" class=\"linkNav\">Carrinho$numItensCarrinho</a>
                <a href=\".$dirCar/quemSomos.php\" class=\"linkNav\">Quem Somos</a>
                <a href=\".$dirCar/login.php\" class=\"linkNav\">Login</a>
            </nav>
            </header>";
    }
echo "<section>
            <h1 class=\"inicio\">
                Criar Conta
            </h1>
            <form class=\"loginSpace\" method=\"POST\" action=\"../scripts/addUsuario.php\">
                <fieldset class=\"dadosUsuario\">
                <legend>Insira seus dados:</legend>
                
                <input type=\"text\" class=\"login\" name=\"nome\" placeholder=\"Nome\" required>
                <input type=\"text\" class=\"login\" name=\"usuarioCPF\" placeholder=\"CPF\" required>
                <input type=\"date\" class=\"login\" name=\"dataNasc\" placeholder=\"Data de Nascimento\" required>
                
                <input type=\"text\" class=\"login\" name=\"usuarioEmail\" placeholder=\"Email\" required>

                <div>
                    <input type=\"text\" class=\"login\" name=\"DDD\" placeholder=\"DDD\" size=\"1\" required>
                    <input type=\"text\" class=\"login\" name=\"usuarioTel\" placeholder=\"Telefone\" required>
                </div>

                <div>
                    <input type=\"password\" class=\"login\" name=\"usuarioSenha\" placeholder=\"Senha\" required>
                    <input type=\"password\" class=\"login\" name=\"usuarioSenhaConf\" placeholder=\"Confirmar senha\" required>
                </div>
                </fieldset>

                <fieldset class=\"tipoUsuario\">
                    <legend>Sou um:</legend>

                    <fieldset id=\"userGuia\">
                        <legend>
                            <label for=\"guia\">Guia Turístico:</label>
                            <input type=\"radio\" class=\"login\" id=\"guia\" name=\"usuarioTipo\" value=\"Guia\" required>
                        </legend>

                        <input type=\"text\" class=\"login\" id=\"habilitacaoGuia\" name=\"habilitacaoGuia\" placeholder=\"Habilitação de Guia turístico\">
                    </fieldset>

                    <div>
                        <label for=\"cliente\">Cliente:</label>
                        <input type=\"radio\" class=\"login\" id=\"cliente\" name=\"usuarioTipo\" value=\"Cliente\" required>
                    </div>

                </fieldset>
                <input id=\"enviarDados\" type=\"submit\" value=\"Enviar\">
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
    <script src=\"../public/js/criarConta.js\"></script>
</body>

</html>
";
?>
