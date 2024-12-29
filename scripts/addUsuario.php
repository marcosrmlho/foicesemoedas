<?php
session_start();
include 'C:\xampp\htdocs\TrabalhoFinal2\foicesemoedas\banco\banco.php';

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

if(isset($_POST['nome']) && isset($_POST['usuarioCPF']) && 
isset($_POST['dataNasc']) && isset($_POST['usuarioEmail']) && 
isset($_POST['DDD']) && isset($_POST['usuarioTel']) && 
isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf'])){
    //Confirmação de Senha//
    if($_POST['usuarioSenha'] == $_POST['usuarioSenhaConf']){
        //Validando CPF//
        if(validaCPF($_POST['usuarioCPF'])){
        //Verificando se o usuario só colocou o primeiro nome//
        if(str_word_count($_POST['nome']) > 1){
            $nome = $_POST['nome'];
            $cpf = $_POST['usuarioCPF'];
            $nasc = $_POST['dataNasc'];
            $email = $_POST['usuarioEmail'];
            $senha = $_POST['usuarioSenha'];
            $tel = ($_POST['DDD'] + $_POST['usuarioTel']);
            $sqlScript = "INSERT INTO Usuario(nome, usuarioCPF, dataNasc, usuarioEmail, usuarioSenha, usuarioTel) VALUES('$nome', '$cpf', '$nasc', '$email', '$senha', '$tel')";

            $conn->query($sqlScript);

        }
        //Nome com apenas o 1º nome//
        else{
            echo "<script>alert(\"Digite seu sobrenome além do primeiro nome\"); history.go(-1)</script>";
        }
        }
        //CPF inválido//
        else{
            echo "<script>alert(\"CPF inválido\"); history.go(-1)</script>";
        }
    }
    //Senha Diferente//
    else{
        echo "<script>alert(\"Senha e confirmação de senha diferentes\"); history.go(-1)</script>";
    }
}
//Deu merda//
else{
    echo "<script>alert(\"Erro no Login, tente novamente mais tarde\"); history.go(-1)</script>";
}


?>