<?php
include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/checkCarrinho.php';
include '../scripts/criarCardsCarrinho.php';

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamikaze Radical</title>
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/carrinho.css">
</head>

<body>

    <main>


        <header>

            <div class="logo">
                <img src="./../public/imagens/designKamikaze.svg" alt="Logomarca Kamikaze Radical" height="200px" width="200px" id="design">
                <h1 class="nome">Kamikaze Radical</h1>
            </div>

            <nav class="menuNav">
                <a href="./" class="linkNav">Home</a>
                <a href="./categorias.php" class="linkNav">Categorias</a>
                <a href="./carrinho.php" class="linkNav">Carrinho<?php echo $numItensCarrinho?></a>
                <a href="./quemSomos.php" class="linkNav">Quem Somos</a>
                <a href="./login.php" class="linkNav">Login</a>
            </nav>
        </header>


        <section>
            <h1 class="inicio">
                Carrinho
            </h1>

            <div class="secao">
                <div class="anuncio">
                    <h2>
                        <?php
                        if ($numItensCarrinhoAux > 0){
                            echo "Pacotes no seu carrinho:";
                        }
                        else{
                            echo "Você não tem pacotes no seu carrinho.";
                        }
                        ?>
                    </h2>
                </div>

                <div class="cardCarrinho">

                    <div id="dadosPasseio">
                        <img src="../public/imagens/imagemAsaDelta.webp" alt="Imagem Asa Delta" class="imgPasseio">
                        <div class="nomeCard">Passeio de Asa Delta na Pedra da Gávea</div>
                    </div>
                    
                    <div class="retirarDoCarrinho">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </div>

                </div>
            </div>

        </section>

        <footer>
            <address>   
                R. Gen. Canabarro, 485 - Maracanã, Rio de Janeiro - RJ, 20271-204
                <a href="tel:+5521912345678">Tel: (21) 91234-5678</a>
                <a href="mailto:contato@kamikaze.com" class="txtLink">contato@kamikaze.com</a>
            </address>
        </footer>

        
    </main>
    <script>
        //var cardDir = "<?php //echo $cardDir?>" //aparentemente não tenho a variável do cardDir, mas vai ser fácil de conseguir, eu espero.
    </script>
    <script src="../public/js/carrinho.js"></script>
</body>

</html>
