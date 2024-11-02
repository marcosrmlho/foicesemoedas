<?php

include "./../enviroment.php";
  // Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar a conexão
if ($conn->connect_errno) {
  die("Connection failed: $conn->connect_error");
};

?>