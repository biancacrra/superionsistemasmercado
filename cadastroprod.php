<?php
include('database.php');
session_start();

if (!isset($_SESSION['admlogado'])) {
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
    <title>login sistema</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imgs/iniciais.png" type="image/x-icon">

</head>

<body>
    <a href="homepageadm.php"><img class="logo-cliente-lateral" src="imgs/logo11_26_1554.png"></a>

    <section class="conteudo">
        <div class="cadastro-prod">
            <form method="POST" class="form form-cadastro">
                <div><a href="homepageadm.php"><img class="cancelicon" src="imgs/cancel.png"></a></div>
                <h3 class="titulo">Cadastrar novo produto:</h3>
                <label class="titulos-cadastro" for="nome-prod">Nome do produto:</label>
                <input class="campo" type="text" name="nome-prod" id="nome-prod" placeholder="Digite o nome do produto" required>
                <label class="titulos-cadastro" for="descricao-prod">Descrição:</label>
                <textarea name="descricao-prod" id="descricao-prod" class="campo" placeholder="Digite uma breve descrição do produto."></textarea>
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
                    echo "<select class='campo' id='categoria-opcoes' name='categoria-opcao'>";
                    $opcao = $_POST['categoria-opcao'];

                    for ($i = 0; $i < $x; $i++) {
                        echo "<option name='selecionado'>";
                        echo $id_categoria[$i]. " - ";
                        echo $categoria[$i];
                        echo "</option>";
                    }

                    echo "</select>";
                }

                $arrayOpcao = explode(' - ',$opcao);
                echo "<br>";
                $id = $arrayOpcao[0];



                
                ?>

                <div id="cadastro-cat"><a class="btn" href="cadastrocat.php">Cadastrar nova Categoria</a></div>
                <label class="titulos-cadastro" for="valor-prod">Valor de venda:</label>
                <input id="valor-prod" name="valor-prod" class="campo" type="text" placeholder="0.00" required>
                <input class="btn btn-cadastro" name="cadastrar" type="submit" value="Cadastrar novo produto">
            </form>

            <?php
            if (isset($_POST['cadastrar'])) {
                $nome = $_POST['nome-prod'];
                $descricao = $_POST['descricao-prod'];
                $valor = $_POST['valor-prod'];

                $query = mysqli_query(
                    $mysqli,
                    "INSERT INTO produto (nome, descricao, preco, fk_ID_categoria) 
                    VALUES ('$nome', '$descricao', '$valor','$id') "
                );
            }

            ?>

        </div>
    </section>
    <div class="rodape"></div>


</body>

</html>
