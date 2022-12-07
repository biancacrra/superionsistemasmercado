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
        while ($dados_prod = mysqli_fetch_assoc($resultado)) {
            $id = $dados_prod['ID_produto'];
            $nome = $dados_prod['nome'];
            $descricao = $dados_prod['descricao'];
            $valor = $dados_prod['preco'];
            $quantidade = $dados_prod['estoque'];
        }
    } else {
        header("location:estoque.php");
    }
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login sistema</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imgs/iniciais.png" type="image/x-icon">

</head>

<body>

    <a href="homepageadm.php"><img class="logo-cliente-lateral" src="imgs/logo11_26_1554.png"></a>
    <section class="conteudo">
        <div class="cadastro-prod">
            <form action="saveedit.php" method="POST" class="form form-cadastro">
                <div><a href="homepageadm.php"><img class="cancelicon" src="imgs/cancel.png"></a></div>

                <?php
                $dados_prod = mysqli_fetch_assoc($resultado);
                echo "<h3 class='titulo'>Alterar produto: $nome </h3>";

                echo "<input type='number' name='id' value='$id' style='display:none'>";

                ?>

                <label class="titulos-cadastro" for="nome-prod">Nome do produto:</label>
                <input value="<?php echo $nome ?>" class="campo" type="text" name="nome-prod" id="nome-prod" placeholder="Digite o nome do produto" required>
                <label class="titulos-cadastro" for="descricao-prod">Descrição:</label>
                <input value="<?php echo $descricao ?>" name="descricao-prod" id="descricao-prod" class="campo" placeholder="Digite uma breve descrição do produto.">
                <label class="titulos-cadastro" for="categoria-opcoes">Categoria:</label>

                <?php
                $sql = "SELECT * FROM categoria";
                if ($query = mysqli_query($mysqli, $sql)) {
                    $id_categoria = [];
                    $categoria = [];
                    $x = 0;
                    while ($registros = mysqli_fetch_assoc($query)) {
                        $id_categoria[$x] = $registros['ID_categoria'];
                        $categoria[$x] = $registros['nome_categoria'];
                        $x++;
                    }

                    echo "<select class='campo' id='categoria-opcoes' name='categoria-opcao' disabled>";
                    $opcao = $_POST['categoria-opcao'];

                    for ($i = 0; $i < $x; $i++) {
                        echo "<option name='selecionado'>";
                        echo $id_categoria[$i] . " - ";
                        echo $categoria[$i];
                        echo "</option>";
                    }

                    echo "</select>";
                }
                $arrayOpcao = explode(' - ', $opcao);
                echo "<br>";
                $id = $arrayOpcao[0];
                ?>

                <label class="titulos-cadastro" for="quantidade-prod">Quantidade em estoque:</label>
                <input value="<?php echo $quantidade ?>" class="campo" type="number" name="quantidade-prod" id="quantidade-prod" placeholder="Quantidade atual do produto em estoque" required>
                <label class="titulos-cadastro" for="valor-prod">Valor de venda:</label>
                <input value="<?php echo $valor ?>" id="valor-prod" name="valor-prod" class="campo" type="text" placeholder="0.00" required>
                <input class="btn btn-cadastro" id="salvar_alt" name="salvar-alt" type="submit" value="Salvar alterações">
                <div class="return-block">
                    <a href="cadastroprod.php"><img class="icon" src="imgs/backicon.png"></a>
                    <a class="btn-return" href="estoque.php">Retornar ao estoque</a>
                </div>
            </form>



        </div>
    </section>
    <div class="rodape"></div>


</body>

</html>
