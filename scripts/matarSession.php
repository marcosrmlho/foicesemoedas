<?php
session_destroy();
echo '<script>alert("Login Desfeito")</script>';
header('.\source\home.php')
?>