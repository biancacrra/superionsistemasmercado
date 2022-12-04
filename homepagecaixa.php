<?php
session_start();

if (!isset($_SESSION['caixalogado'])) {
    header("location:index.php");
    session_destroy();
}

if (isset($_GET['logout'])) {
    header("location:index.php");
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage adm</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imgs/iniciais.png" type="image/x-icon">

</head>

<body>
    <img class="logo" src="imgs/logosistema.png">
    <div class="hp-block">
        <img class="logo-cliente" src="imgs/logo11_26_1554.png">
        <section class="conteudo">
            <div class="shortcut-block">
                <div id="venda"><a class="btn-shortcut btn-venda">Realizar venda</a></div>
                <div id="logout" ><a href="?logout" class="btn-shortcut btn-logout">Finalizar sessão</a></div>
            </div>
        </section>
    </div>

</body>

</html>
