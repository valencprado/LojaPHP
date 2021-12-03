<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Discozz - Carrinho</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<link href="style.css" rel="stylesheet" type="text/css">
	
	
    <link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">

</head>

<body>	
	
	<?php
	
	session_start(); // iniciando sessão
	
	// verificando se usuário está logado
	if(empty($_SESSION['ID'])){
		
		header('location:formlogin.php'); // enviando para formlogon.php
		
	}

	
	include 'conexao.php';	// incluindo arquivo de conexão
	include 'nav.php'; // incluindo arquivo barra de navegação
	include 'cabecalho.html'; // incluindo cabeçalho
	
	// verificando se o codigo do produto NÃO está vazio
	if (!empty($_GET['cd'])) {
	
	// inserindo o código do produto na variável $cd_prod
	$cd_prod=$_GET['cd'];
	
	// se a sessão carrinho não estiver preenchida(setada)
	if (!isset($_SESSION['carrinho'])) {
		  // será criado uma sessão chamado carrinho para receber um vetor
		  $_SESSION['carrinho'] = array();
	}


	
	// se a variavel $cd_prod não estiver setado(preenchida)
	if (!isset($_SESSION['carrinho'][$cd_prod])) {
		
		// será adicionado um produto ao carrinho
		$_SESSION['carrinho'][$cd_prod]=1;
	}
	
	// caso contrario, se ela estiver setada, adicione novos produtos
	else {
		  $_SESSION['carrinho'][$cd_prod]+=1;

	}
		// incluindo o arquivo 'mostraCarrinho.php'
		include 'mostraCarrinho.php';
		
	} else {
		
		//mostrando o carrinho	vazio	
		include 'mostraCarrinho.php';
		
		
	}	
	
	?>
	
	<!-- exibindo o valor da variavel total da compra -->
	<div class="row text-center" style="margin-top: 15px;">
		<h1>Total: R$ <?php echo number_format($total,2,',','.'); ?> </h1>
	</div>
	
	
	<div class="row text-center" style="margin-top: 15px;">
		<a href="index.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>
		<?php if(count($_SESSION['carrinho'])>0) { ?>
		<a href="finalizarCompra.php"><button class="btn btn-lg btn-success">Finalizar Compra</button></a>
		<?php } ?>
	</div>

	
</div>
	
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>