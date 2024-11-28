<?php
include '../../enviroment.php';
include '../banco.php';

if ($conn->query("
insert into usuario (usuarioCPF, nome, dataNasc, usuarioEmail, usuarioSenha, usuarioTel, usuarioTipo)
values ('12345678900', 'José Alexandre da Costa', '1984-11-15', 'jose.alex@email.com', 'senha123', '912345678', 'cliente')
")){
    echo "Usuário José Alexandre criado! <br>";
}
if ($conn->query("
insert into cliente (clienteCPF) values ('12345678900')
")){
    echo "José Alexandre agora é cliente! <br>";
}
?>