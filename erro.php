<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Discozz - Logon de usuário</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
 
     <link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">
</head>

<body>

    <?php
    //nome dos meus arquivos//
    include 'conexao.php';
    include 'nav.php';
    include 'cabecalho.html';

    ?>


    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 text-center">

                <h2 style="font-size: 180%;">Usuário ou senha inválidos!</h2>
                <br />
                <!--conferir o nome do arquivo form de login do usuário aqui-->
                <a href="formlogin.php" class="btn btn-lg btn-block custom-btn" role="button">Tentar Novamente</a>

                <button type="button" class="btn btn-lg btn-block btn-outline-danger">Ainda não sou cadastrado</button>

            </div>
        </div>
    </div>

    <?php include 'rodape.html' ?>

</body>

</html>