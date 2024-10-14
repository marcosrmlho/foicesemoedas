<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalhoFinal";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//inserir sql pro mysql (é meio diferente do postgres...)
$sql = "";

  if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
  }

?>