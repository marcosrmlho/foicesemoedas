<?php
include './../scripts/criarCards.php';
include './../scripts/checkCarrinho.php';
$voltar = $currentPage <= 0 ? 0 : $currentPage-1;

$frente = $currentPage >= $paginasTotais-1 ? $paginasTotais-1 : $currentPage + 1;

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
                    Explore as maravilhas ao redor do Brasil com o Kamikaze!
                </h1>

                <div class="textoCorpo">
                    Aqui na Kamikaze Radical, nós fazemos sonhos virarem realidade. Com coragem e dedicação, disponibilizamos inúmeros passeios para todos os públicos, todos os dias.
                    Isso só é possível por conta do esforço diário de uma equipe de guias que cadastram seus pacotes na plataforma para você aproveitar ao máximo o estilo radical de ser!
                    Vem fazer história com a gente você também!
                </div>

                <div class="secao">
                    <div class="anuncio">
                        <h2>Pacotes:</h2>
                        <h3>
                        <?php
                        if ($numPasseios == 0){
                            echo "Nenhum pacote disponível no momento.";
                        } else {
                            echo "Aqui estão os nossos pacotes!";
                        };
                        ?>
                    </h3>
                    </div>

                    <div class="maisComprados">
                        <?php
                            foreach($cardData as $card) {
                                echo $card;
                            }
                        ?>
                    </div>

                    <div class="ordenacao">

                            <div class="mudarPagina">
                                <button id="voltar"><</button>
                                <p id="paginaAtual"><?php
                                    $currentPageString = $currentPage + 1;
                                    echo "$currentPageString"
                                ?></p>
                                <button id="frente">></button>
                            </div>

                            
                            <select name="ordenar" id="ordenar">
                                <option value=""<?php echo $ordenacaoAtual==null ? "selected" : "" ?>>Ordenar Por:</option>
                                <option value="data" <?php echo $ordenacaoAtual=="data" ? "selected" : "" ?>>Data</option>
                                <option value="ranking" <?php echo $ordenacaoAtual=="ranking" ? "selected" : "" ?>>Ranking</option>
                            </select>
                            
                    </div>
                </div>

        </section>

        <footer>
            <address>
                <div>R. Gen. Canabarro, 485 - Maracanã, Rio de Janeiro - RJ, 20271-204</div>
                <a href="tel:+5521912345678">Tel: (21) 91234-5678</a>
                <a href="mailto:contato@kamikaze.com" class="txtLink">contato@kamikaze.com</a>
            </address>
        </footer>
    </main>

<script>

    var paginaAtual = <?php echo $currentPage?>;
    var voltar = <?php echo $voltar?>;
    var frente = <?php echo $frente?>;
    var ordenacaoAtual = "<?php echo $ordenacaoAtual == null ? "" : $ordenacaoAtual?>";
    
</script>

<script src="./../public/js/final.js"></script>

<script>
    <?php
    if ($queryParameters["carrinho"] == "true"){
        echo "alert('Adcionado ao carrinho com sucesso!')";
    }
    ?>
</script>


</body>

</html>