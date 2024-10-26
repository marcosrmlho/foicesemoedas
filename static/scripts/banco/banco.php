<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalhoFinal";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_errno) {
  die("Connection failed: $conn->connect_error");
};

include "schema.php";

?>