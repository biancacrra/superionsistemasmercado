<?php
session_start();
include('database.php');


if (!isset($_SESSION['admlogado'])) {
    header("location:index.php");
    session_destroy();
}

if (isset($_GET['logout'])) {
    header("location:index.php");
    session_destroy();
}

if (isset($_POST['salvar-alt'])) {
    $id= $_POST['id'];
    $nome = $_POST['nome-prod'];
    $descricao = $_POST['descricao-prod'];
    $valor = $_POST['valor-prod'];
    $quantidade = $_POST['quantidade-prod'];

    $sqlatualiza = 
    "UPDATE produto SET nome='$nome', descricao='$descricao', preco='$valor', estoque='$quantidade' 
    WHERE ID_produto='$id'";

    $resultado = $mysqli->query($sqlatualiza);
}

header('location:estoque.php');