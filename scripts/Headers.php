<?php
$headerLogado = '<header>

<div class="logo">
    <img src="./../public/imagens/designKamikaze.svg" alt="Logomarca Kamikaze Radical" height="200px" width="200px" id="design">
    <h1 class="nome">Kamikaze Radical</h1>
</div>

<nav class="menuNav">
    <a href="./" class="linkNav">Home</a>
    <a href="./categorias.php" class="linkNav">Categorias</a>
    <a href="./carrinho.php" class="linkNav">Carrinho<?php echo $numItensCarrinho?></a>
    <a href="./quemSomos.php" class="linkNav">Quem Somos</a>
    <a href="./login.php" class="linkNav">Sair</a>
</nav>
</header>';

$headerNaoLogado = '<header>

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
</header>';

$headerLogadoGuia = '<header>

<div class="logo">
    <img src="./../public/imagens/designKamikaze.svg" alt="Logomarca Kamikaze Radical" height="200px" width="200px" id="design">
    <h1 class="nome">Kamikaze Radical</h1>
</div>

<nav class="menuNav">
    <a href="./" class="linkNav">Home</a>
    <a href="./categorias.php" class="linkNav">Categorias</a>
    <a href="./carrinho.php" class="linkNav">Carrinho<?php echo $numItensCarrinho?></a>
    <a href="./criarPasseio.php" class="linkNav">Criar Passeio</a>
    <a href="./quemSomos.php" class="linkNav">Quem Somos</a>
    <a href="./login.php" class="linkNav">Sair</a>
</nav>
</header>';
?>