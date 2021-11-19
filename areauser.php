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
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	.tabela
    {
        font-weight: bold;
        font-family: Century Gothic;
    }
	
	</style>
	
	
    <link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">
</head>

<body>	
	
	<?php
	
	session_start();
	if(empty($_SESSION['ID'])){
        header('location:formlogin.php');
    }
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	$cd_user = $_SESSION['ID'];
    $consulta_venda = $cn ->query("select * from vw_venda where cd_cliente = '$cd_user' group by no_ticket");
	
	?>
    <div class="container-fluid">
    <div class="row" style="margin-top: 15px;">
    <h1 class="text-center tabela">Compras</h1>
    </div>
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><h4 class="tabela">Data</h4> </div>
        <div class="col-sm-1 col-sm-offset-1"><h4 class="tabela">Ticket</h4> </div>
				
	</div>		

	
	<?php while($exibe_venda = $consulta_venda->fetch(PDO::FETCH_ASSOC)){?>
	<div class="row text-center" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"> <?php echo date('d/m/Y', strtotime($exibe_venda['dt_venda']));?> </div>
		<div class="col-sm-2"><?php echo $exibe_venda['no_ticket'];?> </div>
                <a href="ticket.php?ticket=<?php echo $exibe_venda['no_ticket'];?>">
				<button style="background-color:#f57842; font-family:Century Gothic; color:black; border:none;">Detalhes da compra</button>
                </a>
	</div>		
	<?php } ?>
	
</div>
	
<?php 
include 'rodape.html';
?>
	
</body>
</html>