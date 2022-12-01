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
            <form class="form form-cadastro">
                <div><a href="homepageadm.php"><img class="cancelicon" src="imgs/cancel.png"></a></div>
                <h3 class="titulo">Cadastrar nova categoria:</h3>
                <label class="titulos-cadastro" for="nome-cat">Nome da categoria:</label>
                <input class="campo" type="text" name="nome-cat" id="nome-cat" placeholder="Digite o nome da categoria" required>
                <label class="titulos-cadastro" for="descricao-cat">Descrição:</label>
                <textarea name="descricao-cat" id="descricao-cat" class="campo" placeholder="Digite uma breve descrição da categoria."></textarea>
                <input class="btn btn-cadastro campo" type="submit" value="Cadastrar nova categoria">
                <div class="return-block">
                    <a href="cadastroprod.php"><img class="icon" src="imgs/backicon.png"></a>
                    <a class="btn-return" href="cadastroprod.php">Retornar ao cadastro de produtos</a>
                </div>
            </form>


        </div>
    </section>

</body>

</html>