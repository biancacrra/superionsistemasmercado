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
                if (!isset($_SESSION['admlogado'])) {
                    echo "<a href='homepagecaixa.php'><img class='canceliconestoque' src='imgs/cancel.png'></a>";
                }
                if (!isset($_SESSION['caixalogado'])) {
                    echo "<a href='homepageadm.php'><img class='canceliconestoque' src='imgs/cancel.png'></a>";
                }

                function a($parametro)
                {
                    echo "<pre>";
                    print_r($parametro);
                    echo "<pre>";
                    die();
                }
                ($_POST['prodescolhido']);
                ?>
            </div>
            <div style="text-align:center" class="formulario-block">
                <form action="venda3.php" method="POST">
                    <h1 class="titulovenda2">Selecione a quantidade desejada:</h1><br>
                    <?php
                    
                    $valortotal = 0;
                    if (isset($_POST['prodescolhido'])) {
                        $prodescolhidos = $_POST['prodescolhido'];
                    }

                    if ($prodescolhidos !== null) {
                        foreach ($prodescolhidos as $chave => $produto) {
                            $sql = "SELECT * FROM produto WHERE ID_produto = $chave";
                            $resultado = $mysqli->query($sql);
                            while ($dados_prod = mysqli_fetch_assoc($resultado)) {
                                $id = $dados_prod['ID_produto'];
                                $nome = $dados_prod['nome'];
                                $descricao = $dados_prod['descricao'];
                                $valor = $dados_prod['preco'];
                                $estoque = $dados_prod['estoque'];
                            }
                            $valortotal += $valor;
                            echo $nome . "<br>";
                            echo "$" . $valor . "<br>";
                            echo "<input class='campo' type='number' name='quantidade[]'><br> <br>";
                            echo "<input name='idprod[$id]' hidden>";
                            
                        }

                    } else {
                        header('location:venda.php');
                    }
                    ?>
                    <div class="botoescompra">
                        <a href='venda3.php'><button type='button' class='btn btn-danger' name='cancelar'>Retornar</button></a>
                        <button type="submit" class="btn btn-success"><input type="submit" hidden> Finalizar compra</button>
                        </a>
                </form>
            </div>
        </div>
    </section>