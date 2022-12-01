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
                <h3 class="titulo">Cadastrar novo(a) colaborador(a):</h3>

                <label class="titulos-cadastro" for="nome-col">Nome:</label>
                <input class="campo" type="text" name="nome-col" id="nome-cat" placeholder="ex: Maria" required>
                
                <label class="titulos-cadastro" for="sobrenome-col">Sobrenome:</label>
                <input class="campo" type="text" name="sobrenome-col" id="sobrenome-col" placeholder="ex: da Silva" required>

                <label class="titulos-cadastro" for="cpf-col">CPF:</label>
                <input class="campo" type="text" name="cpf-col" id="cpf-col" placeholder="ex: 000.000.000-00" required>

                <label class="titulos-cadastro" for="telefone-col">Telefone para contato:</label>
                <input class="campo" type="text" name="telefone-col" id="telefone-col" placeholder="ex: (00) 00000-0000" required>

                <label class="titulos-cadastro" for="email-col">Email:</label>
                <input class="campo" type="text" name="email-col" id="email-col" placeholder="ex: mariadasilva@gmail.com" required>


                <label class="titulos-cadastro" for="senha-col">Senha:</label>
                <input class="campo" type="password" name="senha-col" id="senha-col" placeholder="********" required>
                <p>obs. O email e senha serão utilizados como forma de login no sistema.</p>

                                

                <input class="btn btn-cadastro campo" type="submit" value="Cadastrar novo funcionario">
                <div class="return-block">
                    <a href="cadastroprod.php"><img class="icon" src="imgs/backicon.png"></a>
                    <a class="btn-return" href="homepageadm.php">Retornar a homepage</a>
                </div>
            </form>


        </div>
    </section>

</body>

</html>