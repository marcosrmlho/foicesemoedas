<?php

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno) {
  die("Connection failed: $conn->connect_error");
};

?>