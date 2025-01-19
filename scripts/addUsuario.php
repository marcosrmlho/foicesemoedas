<?php
session_start();
include '../enviroment.php';
include '../banco/banco.php';

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

$todosCPF = $conn->query("select usuarioCPF from Usuario");
while ($row = $todosCPF->fetch_assoc()) {
    $valuesCPF[] = $row;
}
$todosEmail = $conn->query("select usuarioEmail from Usuario");
while ($row = $todosEmail->fetch_assoc()) {
    $valuesEmail[] = $row;
}

if(isset($_POST['nome']) && isset($_POST['usuarioCPF']) && 
isset($_POST['dataNasc']) && isset($_POST['usuarioEmail']) && 
isset($_POST['DDD']) && isset($_POST['usuarioTel']) && 
isset($_POST['usuarioSenha']) && isset($_POST['usuarioSenhaConf']) 
&& isset($_POST['usuarioTipo'])){
    $timestamp = strtotime("-18 years");
    $idadeMinima = gmdate('Y-m-d', $timestamp);
    //Validando idade do Usuário
    if($_POST['dataNasc'] <= $idadeMinima){
        //Validando domiínio do email ou se já está sendo usado
        if((filter_var($_POST['usuarioEmail'], FILTER_VALIDATE_EMAIL)) and !(in_array($_POST['usuarioEmail'], $valuesEmail))){
            //Confirmação de Senha//
            if($_POST['usuarioSenha'] == $_POST['usuarioSenhaConf']){
                //Validando CPF//
                if((validaCPF($_POST['usuarioCPF'])) and !(in_array($_POST['usuarioCPF'], $valuesCPF ))){
                //Verificando se o usuario só colocou o primeiro nome
                if(str_word_count($_POST['nome']) > 1){
                    $nome = $_POST['nome'];
                    $cpf = str_replace(['.', '-'], '', $_POST['usuarioCPF']);
                    $nasc = $_POST['dataNasc'];
                    $email = $_POST['usuarioEmail'];
                    $senha = password_hash($_POST['usuarioSenha'], PASSWORD_BCRYPT);
                    $tipoUser = strtolower($_POST['usuarioTipo']);
                    $tel = $_POST['DDD'] + str_replace('-', '', $_POST['usuarioTel']);

                    $num = ($conn -> query("select count(*) as num from Usuario") -> fetch_assoc())['num'];
                    $sqlEmail = $conn -> query("select usuarioEmail from Usuario");

                    for($i=0; $i < $num; $i++){
                        $emailTeste = ($sqlEmail -> fetch_assoc())['usuarioEmail'];
                        if ($email == $emailTeste){
                            header('location: ../source/criarConta.php/?criarConta=emailExistente');
                            exit();
                        }
                    };
                    $sqlScript = "INSERT INTO Usuario(nome, usuarioCPF, dataNasc, usuarioEmail, usuarioSenha, usuarioTel, usuarioTipo) VALUES('$nome', '$cpf', '$nasc', '$email', '$senha', '$tel', '$tipoUser')";

                    $conn->query($sqlScript);

                    if ($tipoUser == 'cliente'){
                        $conn -> query("insert into Cliente values ('$cpf')");
                        $_SESSION['clienteCPF'] = $cpf;
                        header("location: ../source/home.php");
                        exit();

                    } else if ($tipoUser == 'guia'){
                        if (isset($_POST['usuarioTipo'])){
                            $habilitacaoGuia = $_POST['habilitacaoGuia'];
                            $conn -> query("insert into Guia values ('$cpf', '$habilitacaoGuia')");
                            $_SESSION['guiaCPF'] = $cpf;
                            header("location: ../source/home.php");
                            exit();
                        } else {
                            echo "<script>alert(\"habilitação de guia turístico inválida\"); history.go(-1)</script>";
                        }
                    } else {
                        echo "<script>alert(\"tipo de usuário inválido\"); history.go(-1)</script>";
                    }


                }
                //Nome com apenas o 1º nome
                else{
                    echo "<script>alert(\"Digite seu sobrenome além do primeiro nome\"); history.go(-1)</script>";
                }
                }
                //CPF inválido
                else{
                    echo "<script>alert(\"CPF inválido ou já usado\"); history.go(-1)</script>";
                }
            }
            //Senha Diferente
            else{
                echo "<script>alert(\"Senha e confirmação de senha diferentes\"); history.go(-1)</script>";
            }
        }
        //Erro no Email
        else{
            echo "<script>alert('Email inválido ou já usado'); history.go(-1)</script>";
        }
    }
    //Usuário novo demais
    else{
        echo "<script>alert('O Usuário deve ser maior de 18 anos para usar o serviço'); history.go(-1)</script>";
    }
}
//Erro no Post
else{
    echo "<script>alert(\"Erro no Login, tente novamente mais tarde\"); history.go(-1)</script>";
}
?>