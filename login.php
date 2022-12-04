<?php
session_start();
include('cadastro.php');
include('database.php');


if (isset($_POST['email']) || isset($_POST['senha'])) {
    if ($_POST['email'] == '') {
        echo "preencha o email";
    } else if ($_POST['senha'] == '') {
        echo "senha inválida";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $senha = md5($senha);

        $cargoadm = 1;
        $cargocaixa = 2;

        if (
            $sql_code =
            "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' AND cargo = '$cargoadm'"
        ) {
            $sql_query = $mysqli->query($sql_code) or die("Deu erro no sql: " . $mysqli->error);
            $qtdequery = $sql_query->num_rows;
            $usuario = $sql_query->fetch_assoc();
            if ($qtdequery == 1) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['admlogado'] = true;
                $_SESSION['id'] = $usuario['id'];
                header("location: homepageadm.php");
            } else {
                echo "login ou senha inválidos";
                header("location: index.php");
            }
        }
        if ($sql_code =
            "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' AND cargo = '$cargocaixa'"
        ) {
            $sql_query = $mysqli->query($sql_code) or die("Deu erro no sql: " . $mysqli->error);
            $qtdequery = $sql_query->num_rows;
            $usuario = $sql_query->fetch_assoc();
            if ($qtdequery == 1) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['caixalogado'] = true;
                $_SESSION['id'] = $usuario['id'];
                header("location: homepagecaixa.php");
            } else {
                echo "login ou senha inválidos";
                header("location: index.php");
            }
        }
    }
}
