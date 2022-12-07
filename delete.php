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


if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM produto WHERE ID_produto = '$id'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        $sqldelete = "DELETE FROM produto WHERE ID_produto=$id";
        $resultadodelete = $mysqli->query($sqldelete);
    } else {
        header("location:estoque.php");
    }
}

header("location:estoque.php")

?>
