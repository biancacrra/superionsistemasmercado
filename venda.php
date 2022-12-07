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
$x = 0;

while ($dados_prod = mysqli_fetch_assoc($resultado)) {

    $id = $dados_prod['ID_produto'];
    $nome = $dados_prod['nome'];
    $descricao = $dados_prod['descricao'];
    $valor = $dados_prod['preco'];

    $arrayprodid[$x] = $id;
    $arrayprodnome[$x] = $nome;
    $arrayproddesc[$x] = $descricao;
    $arrayprodvalor[$x] = $valor;
    $x++;
}

$totalitens = $x;

for ($y = 0; $y < $totalitens; $y++) {

    $arrayprodutos = [

        'id' => $arrayprodid[$y],
        'produto' => $arrayprodnome[$y],
        'descricao' => $arrayproddesc[$y],
        'valor' => $arrayprodvalor[$y]

    ];
}
$totalprod = $y;
$quantidade = 0;
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
        <div class="estoque-block venda-block">
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
                <div class="formulario-block">
                <form action="venda2.php" method="POST">
            <?php
            foreach ($arrayprodnome as $chave => $produto) {
                echo "<label class='form-check-label labelvenda'>";
                    $id = $arrayprodid[$chave];
                    echo "$produto  -  $arrayprodvalor[$chave]
                        <input class='form-check-input' type='checkbox' name='prodescolhido[$id]' value='$arrayprodvalor[$chave]'><br><br>
                        <label>";
                    }
            ?>
            <div class="botoescompra">
                <?php 
                if (!isset($_SESSION['admlogado'])) {
                    echo "<a href='homepagecaixa.php'><button type='button' class='btn btn-danger' name='cancelar'>Cancelar</button></a>";
                }
                if (!isset($_SESSION['caixalogado'])) {
                    echo "<a href='homepageadm.php'><button type='button' class='btn btn-danger' name='cancelar'>Cancelar</button></a>";
                }
                ?>

                <button type="submit" class="btn btn-success"><input type="submit" value="" hidden> Prosseguir</button>
            </div>
            </form>
            </div>
        </div>
    </section>

</body>

</html>
