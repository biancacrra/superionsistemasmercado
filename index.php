<?php
include ('database.php');
include('login.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if($_POST['email'] == ''){
        echo "preencha o email";
    }else if ($_POST['senha'] == ''){
        echo "senha inválida";
    }else {

        $email = ($_POST['email']);
        $senha = ($_POST['senha']);

        $sql_code = 
        "SELECT * FROM usuario WHERE email = '$email' && senha = '$senha'";
        $sql_query = $conexao -> query($sql_code) or die();
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
    <section class="conteudo">
        <div class="login-block">
            <img id="logo-login" src="imgs/logosistema.png">
            <form class="form" method="POST" action="./login.php">
                <h3 class="titulo" >Seja bem vindo(a) colaborador(a)! <br> Realize seu login:</h3>
                <input class="campo" name="email" placeholder="Digite seu email">
                <input class="campo" name="senha" type="password" placeholder="Digite sua senha">
                <input class="btn btn-login" type="submit" value="Acessar">
            </form>
        </div>
    </section>
</body>

</html>