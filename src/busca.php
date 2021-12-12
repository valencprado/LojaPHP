<!doctype html>

<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <title>Busca</title>

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

    session_start();

    include 'conexao.php';

    if (empty($_GET['txtBuscar'])) {
        header("Location: index.php");
    }

    $pesquisa = $_GET['txtBuscar'];

    $consulta = $cn->query("select * from vw_disco where nm_disco like concat ('%','$pesquisa','%') or nm_banda like concat ('%','$pesquisa','%')");
    if ($consulta->rowCount() == 0) {
        header("Location: erro_busca.php");
    }
    //aqui é feito uma concatenação com a ideia de mostrar ao site que, pesquisando algo, independentemente de estar no começo, meio ou fim, será pesquisado
    //no caso do prof (e do meu) existe essa questão do autor, mas pode ser que seja diferente do seu, então pode apagar/alterar
    include 'nav.php';
    include 'cabecalho.html';


    ?>

    <div class="container-fluid">

        <?php while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="row" style="margin-top: 15px;">

                <div class="col-sm-1 col-sm-offset-1"><img src="Imagens/<?php echo $exibe['ds_capa'] ?>" class="img-responsive"></div>
                <div class="col-sm-5">
                    <h4 style="padding-top:20px"><?php echo $exibir['nm_disco'] ?></h4>
                </div>
                <div class="col-sm-2">
                    <h4 style="padding-top:20px">R$ <?php echo number_format($exibir['vl_preco'], 2, ',', '.') ?></h4>
                </div>
                <div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
                    <div class="text-center">
                        <a href="detalhes.php?cd=<?php echo $exibe['cd_disco']; ?>">
                            <button class="btn btn-lg btn block btn-details">
                                <span> Detalhes</span>
                            </button>
                        </a>
                    </div>


                <?php } ?>
                </div>

            </div>



    </div>

    <?php

    include 'rodape.html';

    ?>

</body>
<!--depois de copiar é só salvar como busca.php, ou como preferir -->

</html>