<?php 
$server = "localhost";
$user = "postgres";
$password = "123456";
$port = "5432";

$infos_conexao = new conexao ("host=$server port=$port dbname=mercadosystem user=$user password=$password");


$conexao = pg_connect($infos_conexao);



?>