<?php
$hostname = "localhost";
$database = "mercadosystem";
$user = "root";
$password = "";

$mysqli = new mysqli ($hostname, $user, $password, $database);

if ($mysqli->connect_errno) {
    die('Falha ao se conectar ao BD');
}

?>

