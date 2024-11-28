<?php
include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/checkCarrinho.php'
?>
<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamikaze Radical</title>
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/cards.css">
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
                Quem Somos
            </h1>
            <div class="secao">
                <div class="textoCorpo">
                Desde 2024, a Kamikaze Radical tem sido o combustível para aqueles que buscam emoção,
                adrenalina e experiências inesquecíveis. Somos uma empresa dedicada a transformar o cotidiano dos nossos clientes,
                oferecendo pacotes de esportes radicais e passeios cheios de aventura. Seja em águas agitadas, trilhas desafiadoras ou nos ares,
                garantimos momentos de pura adrenalina, sempre com segurança e muita diversão.
                </div>
                
                <div class="textoCorpo">
                Nosso compromisso é levar você ao limite, proporcionando vivências que ficarão na memória para sempre.
                Com uma equipe apaixonada por aventura e experiente no que faz, a Kamikaze Radical é o diferencial que você procura para sair da rotina e viver intensamente.
                Aqui, sua próxima aventura está a um passo de distância. Venha conosco e sinta a emoção!
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

</body>

</html>
