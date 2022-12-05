<?php
session_start();
include('database.php');

if (!isset($_SESSION['admlogado'])) {
    if (!isset($_SESSION['caixalogado'])) {
        header("location:index.php");
        session_destroy();
    }
}

if (isset($_GET['logout'])) {
    header("location:index.php");
    session_destroy();
}


$sql = "SELECT * FROM produto ORDER BY nome";
$resultado = $mysqli->query($sql);


$sql2 = "SELECT * FROM categoria";
$resultadoid = $mysqli->query($sql2);

$sql3 = "SELECT COUNT(*) FROM produto";
$qtde_itens = $mysqli->query($sql3);



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

    <section class="conteudo">
        <div class="estoque-block">
            <div>
                <?php 
                if(!isset($_SESSION['admlogado'])){
                    echo "<a href='homepagecaixa.php'><img class='canceliconestoque' src='imgs/cancel.png'></a>";
                }
                if (!isset($_SESSION['caixalogado'])){
                    echo "<a href='homepageadm.php'><img class='canceliconestoque' src='imgs/cancel.png'></a>";
                }
                    ?>
                </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Seleção</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($dados_prod = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $dados_prod['nome'] . "</td>";
                        echo "<td>" . $dados_prod['descricao'] . "</td>";
                        echo "<td>" . $dados_prod['preco'] . "</td>";
                        echo "<td>" . $dados_prod['estoque'] . "</td>";
                        echo "<td><input type='checkbox' name='prod-selecionado'></td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </section>



















</body>

</html>