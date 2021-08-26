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

<style type="text/css">
.navbar{ margin-top:  0;
font-family: Century Gothic;
  font-weight: bold;}
.jumbotron{
  font-family: Georgia;
  font-weight: bold;

}
h1
{ font-weight: bold;
}
 

</style>


</head>
<body>
  <?php include 'nav.php'; ?>
  <?php include 'cabecalho.html'; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <img src="https://placehold.it/450x320" class="img-responsive" style="width: 100%">
        <div><h1>Fleetwood Mac - "Rumours"</h1></div>
         <div><h4>R$200,00</h4></div>
      </div>
       <div class="col-sm-3">
        <img src="https://placehold.it/450x320" class="img-responsive" style="width: 100%">
        <div><h1>Green Day - "Nimrod"</h1></div>
         <div><h4>R$100,00</h4></div>
      </div>
       <div class="col-sm-3">
        <img src="https://placehold.it/450x320" class="img-responsive" style="width: 100%">
        <div><h1>Nirvana - "Nevrmind"</h1></div>
         <div><h4>R$150,00</h4></div>
      </div>
       <div class="col-sm-3">
        <img src="https://placehold.it/450x320" class="img-responsive" style="width: 100%">
        <div><h1>Green Day - "American Idiot"</h1></div>
         <div><h4>R$200,00</h4></div>
      </div>
       <div class="col-sm-3">
        <img src="https://placehold.it/450x320" class="img-responsive" style="width: 100%">
        <div><h1>Bring Me The Horizon - "Sempiternal"</h1></div>
         <div><h4>R$100,00</h4></div>
      </div>    
 </div>
<?php include 'rodape.html'; ?>
</body>
</html>