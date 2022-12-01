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
                <h3 class="titulo">Cadastrar novo produto:</h3>
                <label class="titulos-cadastro" for="nome-prod">Nome do produto:</label>
                <input class="campo" type="text" name="nome-prod" id="nome-prod" placeholder="Digite o nome do produto" required>
                <label class="titulos-cadastro" for="descricao-prod">Descrição:</label>
                <textarea name="descricao-prod" id="descricao-prod" class="campo" placeholder="Digite uma breve descrição do produto."></textarea>
                <label class="titulos-cadastro" for="categoria-opcoes">Categoria:</label>
                <select class="campo" id="categoria-opcoes" name="categoria-opcoes" required>
                    <!--fazer em um arquivo php e fazer um foreach das categorias-->
                </select>
                <div id="cadastro-cat"><a class="btn" href="cadastrocat.php">Cadastrar nova Categoria</a></div>
                <label class="titulos-cadastro" for="valor-prod">Valor de venda:</label>
                <input id="valor-prod" name="valor-prod" class="campo" type="number" placeholder="0,00" required>
                <input class="btn btn-cadastro" type="submit" value="Cadastrar novo produto">
            </form>


        </div>
    </section>

</body>

</html>