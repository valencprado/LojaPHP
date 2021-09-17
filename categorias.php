<! DOCTYPE HTML>
<html lang="pt-br"> <!-- indicando a linguagem que iremos usar no codigo html -->
<head>

<title>Loja Virtual</title>
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

.navbar{ margin-top:  0;
font-family: Century Gothic;
  font-weight: bold;
}

h1
{
 font-family: Georgia;
 font-weight: bold;
}

</style>


</head>
<body>
<?php include 'nav.php'; 
      include 'cabecalho.html'; 
      include 'conexao.php';
     $cat = $_GET['cat'];

   $consulta = $cn->query("select nm_banda,nm_disco , vl_preco, ds_capa, qt_estoque from vw_disco where ds_categoria ='$cat';")
?>

  <div class="container-fluid">
    <div class="row">
      <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
      <div class="col-sm-3">
        <img src="Imagens/<?php echo $exibe['ds_capa']?>.png" class="img-responsive" style="width: 100%">
        <div><h4 class="titulo"><?php echo mb_strimwidth($exibe['nm_disco'], 0, 30, '...'); ?> - <?php echo mb_strimwidth($exibe['nm_banda'], 0, 30, '...'); ?></h4></div>
         <div><h5>R$ <?php echo number_format ($exibe['vl_preco'], 2,',', '.')?></h5></div>
          <div class="text-center"> 
            <button class="btn btn-lg btn block btn-info">
              <span class="glyphicon glyphicon-info-sign">Detalhes</span>
            </button>
          </div>
         <div class="text-center" style = "margin-top:5px; margin-bottom:5px;"> 
          <?php if($exibe['qt_estoque'] > 0){?>
            <button class="btn btn-lg btn block btn-danger">
              <span class="glyphicon glyphicon-usd">Comprar</span>
            <?php } else {?>
    <button class="btn btn-lg btn block btn-info" disabled>
<span class="glyphicon glyphicon-remove-circle">Indisponível</span>
</button>
<?php } ?>
</div>
            </button>
          
</div>
      </div>
    </div>
  </div>
      <?php }?>
<?php include 'rodape.html'; ?>
</body>
</html>