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
            
            <div class="secao">
            <form action="./../scripts/criarPasseioBanco.php" method="POST" enctype="multipart/form-data" ="formCriarPasseio">
                <fieldset class="dadosPasseio">
                    <legend>Dados do Passeio</legend>

                    <fieldset class="horariosPasseio">
                        <legend>Horários</legend>
                        <input type="text" name="horaInicio" id="horaInicio" placeholder="Hora do Início">
                        <input type="text" name="dataInicio" id="dataInicio" placeholder="Data do Início">
                        <input type="text" name="horaFinal" id="horaFinal" placeholder="Hora do Término">
                        <input type="text" name="dataFinal" id="dataFinal" placeholder="Hora do Término">
                    </fieldset>
                    
                    <fieldset class="informacoesPasseio">
                        <legend>Informações Principais</legend>
                        <input type="text" name="nome" id="nome" placeholder="Nome do Passeio">
                        <input type="text" name="ranking" id="ranking" placeholder="Ranking">
                        <input type="text" name="valor" id="valor" placeholder="Valor">
                        <input type="text" name="descricao" id="descricao" placeholder="Descrição">
                    </fieldset>

                    <fieldset class="imagemPasseio">
                        <legend>Imagens</legend>
                        <div>
                            <label for="imgSource">Imagem do Passeio:</label>
                            <input type="file" name="imgSource" id="imgSource">
                        </div>
                        <input type="text" name="altImg" id="altImg" placeholder="Texto Alternativo">
                    </fieldset>

                </fieldset>
                
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

?>