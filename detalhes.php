<!doctype html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Discozz</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--ícone de:-->
    <link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">
    <link href="style.css" rel="stylesheet" type="text/css">



</head>

<body>

    <?php
    session_start();
    include 'conexao.php';
    include 'nav.php';
    include 'cabecalho.html';
    if(!empty($_GET['cd'])){
    $cd_disco = $_GET['cd'];

    $consulta = $cn->query(" select * from tbl_disco where cd_disco = '$cd_disco'");
    $exibir = $consulta->fetch(PDO::FETCH_ASSOC);
    }
    else{
    header("Location:index.php");
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <h1>Detalhes do Produto</h1>

                <img src="Imagens/<?php echo $exibir['ds_capa']; ?>" class="img-responsive" style="width:100%;">


            </div>

            <div class="col-sm-7">
                <h1><?php echo $exibir['nm_disco']; ?></h1>  
                <br /><br />
                <p><?php echo $exibir['ds_resumo_disco']; ?></p>
                <br />  <br />
                <p style="font-weight:bold; font-size: 30px;">R$ <?php echo number_format($exibir['vl_preco'], 2, ',', '.') ?></p>
                <a href="carrinho.php?cd=<?php echo $exibe['cd_disco']; ?>">
                <button class="btn btn-lg btn-success">Comprar</button>
               </a>
            </div>
        </div>

        <?php include 'rodape.html';?>

</body>
</html>