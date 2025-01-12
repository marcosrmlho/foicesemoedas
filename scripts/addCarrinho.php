<?php
include '../enviroment.php';
include '../banco/banco.php';
include './funcoesUniversais.php';
session_start();

$url = explode("/scripts", $_SERVER['REQUEST_URI'])[0];

$cardDir = $queryParameters['cardDir'];
$log = false;

if (isset($_SESSION['clienteCPF'])) {
    $clienteCPF = $_SESSION['clienteCPF'];

    $sqlCliente = $conn->query("select clienteCPF from cliente where clienteCPF = '$clienteCPF'");
    if ($sqlCliente->num_rows > 0) {
        $log = true;
    }

    if ($log) {
        
        $sqlPasseio = $conn->query("select idPasseio from passeio where cardDir = '$cardDir'");
        if ($sqlPasseio->num_rows > 0) {
            $idPasseio = $sqlPasseio->fetch_assoc()['idPasseio'];


            if ($conn->query("insert into carrinho (clienteCPF, idPasseio) values ('$clienteCPF', '$idPasseio')")) {
                echo "Item adicionado ao carrinho com sucesso!";
                header("location: $url/source/?carrinho=true");
                exit();
            } else {
                echo "Erro ao adicionar ao carrinho: " . $conn->error;
            }
        } else {
            echo "Passeio não encontrado.";
            header("location: $url/source/carrinho=errPasseio");
            exit();
        }
    } else {
        echo "Usuário não encontrado no banco.";
        header("location: $url/source/login.php/?carrinho=false");
        exit();
    }
} else {
    echo "Usuário não logado.";
    header("location: $url/source/login.php/?carrinho=false");
    exit();
}
?>