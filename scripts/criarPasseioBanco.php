<?php
// Exibir o conteúdo de $_POST
var_dump($_POST);
var_dump($_FILES);

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];

if ( isset( $_FILES[ 'imgSource' ][ 'name' ] ) && $_FILES[ 'imgSource' ][ 'error' ] == 0 ) {
    echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'imgSource' ][ 'name' ] . '</strong><br />';
    echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'imgSource' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'imgSource' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'imgSource' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
    $arquivo_tmp = $_FILES['imgSource']['tmp_name'];
    $nome = $_FILES[ 'imgSource' ][ 'name' ];
 
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    $extensao = strtolower ( $extensao );

    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {

        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
        // Concatena a pasta com o nome
        $destino = $url . 'public/imagens' . $novoNome;

        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            echo ' < img src = "' . $destino . '" />';
        }
        else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum arquivo!';