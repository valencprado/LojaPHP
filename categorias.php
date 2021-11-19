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
    <style type="text/css">
      .navbar {
        margin-bottom: 0;
        font-family: Century Gothic;
        font-weight: bold;
      }

      
    </style>

<link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">
  </head>

  <body>
    <?php session_start();
    include 'conexao.php';
    include 'nav.php';
    include 'cabecalho.html';
    $cat = $_GET['cat'];

    $consulta = $cn->query("select cd_disco, nm_banda, nm_disco , vl_preco, ds_capa, qt_estoque from vw_disco where ds_categoria ='$cat';")
    ?>

    <div class="container-fluid">
      <div class="row">
        <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="col-sm-3">
            <img src="Imagens/<?php echo $exibe['ds_capa'] ?>" class="img-responsive" style="width: 100%">
            <div>
              <h4 class="titulo"><?php echo mb_strimwidth($exibe['nm_disco'], 0, 25, '...'); ?> - <?php echo mb_strimwidth($exibe['nm_banda'], 0, 10, '...'); ?></h4>
            </div>
            <div>
              <h5>R$ <?php echo number_format($exibe['vl_preco'], 2, ',', '.') ?></h5>
            </div>

           <div class="text-center">
              <a href="detalhes.php?cd=<?php echo $exibe['cd_disco']; ?>">
                <button class="btn btn-lg btn block" >
                  <span class="glyphicon glyphicon-info-sign"style="background-color: #ffff66; color:white;"> Detalhes</span>
                </button>
                </a>
            </div>
            <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
              <?php if ($exibe['qt_estoque'] > 0) { ?>
                <button class=" btn-lg btn block" style="background-color: #063970; color:azure;" >
                <a href="carrinho.php?cd=<?php echo $exibe['cd_disco']; ?>">
                  <span class="glyphicon glyphicon-usd">Comprar</span>
                </a>
                </button>
                <?php } else { ?>
                  <button class=" btn-lg block" style="background-color:crimson;" disabled>
                    <span class="glyphicon glyphicon-remove-circle">Indisponível</span>
                  </button>
                <?php } ?>
            </div>
            </button>

          </div>
      </div>
      <?php } ?>
    </div>
    </div>
 
  <?php include 'rodape.html'; ?>
  </body>

  </html>