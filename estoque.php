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
            <div><a href="homepageadm.php"><img class="canceliconestoque" src="imgs/cancel.png"></a></div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Ações</th>
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

                        echo "<td>
                        <div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'>
                        <div class='btn-group me-2' role='group' aria-label='First group'>
                          <button type='button' class='btn btn-primary botao-acao1'><a href='edit.php?id=$dados_prod[ID_produto]'><img class='icons-estoque' src='imgs/editbtn.png'></a></button>
                          <button type='button' class='btn btn-primary botao-acao2'><a href='delete.php?id=$dados_prod[ID_produto]'><img class='icons-estoque'src='imgs/deletebtn.png'.png'></a></button>
                        </div>
                        </td>";
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>



















</body>

</html>
