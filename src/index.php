<! DOCTYPE HTML>
  <html lang="pt-br">
  <!-- indicando a linguagem que iremos usar no codigo html -->

  <head>

    <title>Discozz</title>
    <meta charset="utf-8"> <!-- indicando o sistema de caractere utf-8 -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery livraria -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- JavaScript compilado-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href="/css/bootstrap.min.css">
    <link rel='stylesheet' href="/css/style.css">
    <link href="style.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">
  </head>

  <body>
    <?php
    session_start();
    include 'conexao.php';
    include 'nav.php';
    include 'cabecalho.html';


    $consulta = $cn->query(' select cd_disco, nm_banda, nm_disco, vl_preco, ds_capa, qt_estoque from vw_disco;
');
    ?>

    <div class="container-fluid">
      <div class="row">
        <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="col-sm-3">
            <img src="./Imagens/<?php echo $exibe['ds_capa'] ?>" class="img-responsive" style="width: 100%;">
            <div>
              <h3><?php echo mb_strimwidth($exibe['nm_disco'], 0, 30, '...'); ?> - <?php echo mb_strimwidth($exibe['nm_banda'], 0, 30, '...'); ?></h3>
            </div>
            <div>
              <h4>R$ <?php echo number_format($exibe['vl_preco'], 2, ',', '.') ?></h4>
            </div>
            <!--parte dos botõesss -->
            <!--detalhes -->
            <div class="text-center">
              <a href="detalhes.php?cd=<?php echo $exibe['cd_disco']; ?>">
                <button class="btn btn-lg btn-details">
                  <span> Detalhes</span>
                </button>
              </a>
            </div>
            <!--botão de comprar disponível -->
            <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
              <?php if ($exibe['qt_estoque'] > 0) { ?>
                <a href="carrinho.php?cd=<?php echo $exibe['cd_disco']; ?>">
                <button class="btn btn-lg btn block btn-buy">
                  <span>Comprar</span>
                </button>
              </a>
                  <!-- botão de comprar indisponível -->
                <?php } else { ?>
                  <button class="btn btn-lg btn btn-indisponible" disabled>
                    <span>Indisponível</span>
                  </button>
                <?php } ?>
            </div>
          </div>

        <?php } ?>
      </div>
    </div>
  

    <?php include 'rodape.html'; ?>
  </body>

  </html>