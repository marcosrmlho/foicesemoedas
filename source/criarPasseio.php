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
    <link rel="stylesheet" href="../public/css/criarPasseio.css">
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
                <a href="./criarPasseio.php" class="linkNav criarPasseioNav">Criação de Passeio</a>
            </nav>
        </header>


        <section>
            <h1 class="inicio">
                Criação de Passeio
            </h1>
            
            <div class="secao" id="secaoCriarPasseio">
            <form action="./../scripts/criarPasseioBanco.php" method="POST" enctype="multipart/form-data" class="formCriarPasseio">
                <fieldset class="dadosPasseio">
                    <legend>Dados do Passeio</legend>

                    <fieldset class="horariosPasseio">
                        <legend>Horários</legend>
                        <div class="hora">
                            <label for="horaInicio">Hora do Início</label>
                            <input type="time" name="horaInicio" id="horaInicio" required>
                            <label for="horaTérmino">Hora do Término</label>
                            <input type="time" name="horaFinal" id="horaFinal" required>
                        </div>
                        <div class="data">
                            <label for="dataInicio">Data do Início:</label>
                            <input type="date" name="dataInicio" id="dataInicio" required>
                            <label for="dataFinal">Data do Término:</label>
                            <input type="date" name="dataFinal" id="dataFinal" required>
                        <div>
                    </fieldset>
                    
                    <fieldset class="informacoesPasseio">
                        <legend>Informações Principais</legend>
                            <input type="text" name="nome" id="nome" placeholder="Nome do Passeio" required>
                            <input type="text" name="ranking" id="ranking" placeholder="Ranking" required>
                            <input type="text" name="valor" id="valor" placeholder="Valor" required>
                        <textarea name="descricao" id="descricao" placeholder="Descrição" required></textarea>
                    </fieldset>

                    <fieldset class="imagemPasseio">
                        <legend>Imagens</legend>
                        <div>
                            <label for="imgSource">Imagem do Passeio:</label>
                            <input type="file" name="imgSource" id="imgSource" required>
                        </div>
                        <input type="text" name="altImg" id="altImg" placeholder="Texto Alternativo" required>
                    </fieldset>

                </fieldset>
                <div id="importante">
                    <p id="textoImportante"><b>IMPORTANTE!</b> Ao criar um passeio, os direitos de imagem e edição relacionados tornam-se propriedades intelectuais do Grupo Kamikaze®.
                    Decisão amparada pela Lei nº 9.610/1998, Lei nº 9.609/1998 e a Lei nº 13.709/2018</p>
                </div>
                <input type="submit" value="Criar Passeio" id="submitButton">

            </form>

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