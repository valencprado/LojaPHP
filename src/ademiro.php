<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Discozz - Área do Admnistrador</title>
	
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
	
    if(empty($_SESSION['Status'])||$_SESSION['Status'] != 1){
        header('location:index.php');
        //sessão vazia ou não for adm, volta pro index
    }
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				
				<h2 style="font-weight: bold; font-family: Century Gothic;">Área administrativa</h2>
				
				
				<a href="formproduto.php">			
				<button type="submit" class="btn btn-block btn-lg btn-primary">
					
					Incluir Produto
					
				</button>
					
				</a>
                <br />
				<a href=lista.php>
				<button type="submit" class="btn btn-block btn-lg btn-warning">
					
					Alterar / Excluir Produto
					
				</button>
				</a> 
                <br />
				
				<a href="index.php">
				<button type="submit" class="btn btn-block btn-lg btn-danger">
					
					Sair da área administrativa
					
				</button>
				</a>
                <br />
				
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>