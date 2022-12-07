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

                ?>
            </div>
            <div style="text-align:center" class="formulario-block">
                <form action="" method="POST">
                    <h1 class="titulovenda2">Deseja finalizar a compra?</h1><br>
                    <?php

                    $valorfinal = 0;

                    if (isset($_POST['idprod'])) {
                        $idprods = $_POST['idprod'];
                    }

                    $valortotal = 0;
                    $quantidade = $_POST['quantidade'];
                    $quantidadeunidade = 0;
                    $x = 0;



                    if ($idprods !== null) {
                        foreach ($idprods as $chave => $idprod) {
                            $sql = "SELECT * FROM produto WHERE ID_produto = $chave";
                            $resultado = $mysqli->query($sql);
                            while ($dados_prod = mysqli_fetch_assoc($resultado)) {
                                $id = $dados_prod['ID_produto'];
                                $nome = $dados_prod['nome'];
                                $descricao = $dados_prod['descricao'];
                                $valor[$x] = $dados_prod['preco'];
                                $estoque = $dados_prod['estoque'];
                                $x++;
                            }
                        }

                        foreach ($quantidade as $key => $value) {
                            if ($quantidade[$key] > $estoque) {
                                header('location: venda.php');
                            } else {
                                if (isset($_POST['finalizar'])) {
                                    $query = mysqli_query(
                                        $mysqli,
                                        "INSERT INTO venda (valor, id_produto, quantidade) 
                                        VALUES ('$valorfinal', '$idprods[$key]','$quantidade[$key]')"
                                    );
                                }
                                $valortotal = $valor[$key] * $quantidade[$key];
                                $valorfinal += $valortotal;
                            }
                        }
                    }








                    ?>
                    <h4 class="titulovenda2">O valor total será: R$<?php echo $valorfinal; ?></h4><br>
                    <div class="botoescompra">
                        <a href='venda.php'><button type='button' class='btn btn-danger' name="cancelar">Retornar</button></a>
                        <button type="submit" class="btn btn-success"><input type="submit" name="finalizar" hidden> Finalizar compra</button>
                        </a>
                </form>
            </div>
        </div>
    </section>