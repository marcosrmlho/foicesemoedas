<?php
include '../enviroment.php';
include '../banco/banco.php';
include './funcoesUniversais.php';
session_start();

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];

$_SESSION['clienteCPF'] = '12345678900'; //simula o log do usuário na aba de "login"

$cardDir = $queryParameters['cardDir']; // Obtém a variável cardDir passada pela URL
$log = false;

if (isset($_SESSION['clienteCPF'])) {
    $clienteCPF = $_SESSION['clienteCPF'];

    // Verifica se o usuário está registrado no banco
    $sqlCliente = $conn->query("select clienteCPF from cliente where clienteCPF = '$clienteCPF'");
    if ($sqlCliente->num_rows > 0) {
        $log = true;
    }

    if ($log) {
        // Obtém o ID do passeio correspondente ao cardDir
        $sqlPasseio = $conn->query("select idPasseio from passeio where cardDir = '$cardDir'");
        if ($sqlPasseio->num_rows > 0) {
            $idPasseio = $sqlPasseio->fetch_assoc()['idPasseio'];

            // Insere o passeio no carrinho e redireciona para a pagina home
            if ($conn->query("insert into carrinho (clienteCPF, idPasseio) values ('$clienteCPF', '$idPasseio')")) {
                echo "Item adicionado ao carrinho com sucesso!";
                header("location: $url/source/?carrinho=true");
            } else {
                echo "Erro ao adicionar ao carrinho: " . $conn->error;
            }
        } else {
            echo "Passeio não encontrado.";
            header("location: $url/source/carrinho=errPasseio");
        }
    } else {
        echo "Usuário não encontrado no banco.";
        header("location: $url/source/login.php/?carrinho=false");
    }
} else {
    echo "Usuário não logado.";
    header("location: $url/source/login.php/?carrinho=false");
}
?>