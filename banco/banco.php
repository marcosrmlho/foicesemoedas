<?php

include "../../../enviroment.php";

function criarBanco() {

  // Criar a conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar a conexão
  if ($conn->connect_errno) {
    die("Connection failed: $conn->connect_error");
  };
}
?>