<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro - Discozz</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="jquery.mask.js"></script>
	
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">
<script>
	
$(document).ready(function(){
    $("#cep").mask("00000-000");
});
	
	
</script>
	
</head>
	
	
	

<body>
	
<?php
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2 style="font-family:Century Gothic;font-weight:bold;">Cadastro de novo Cliente</h2>
				
				<form method="post" action="inserirusuario.php" name="logon">
				
					<div class="form-group">
				
						<label for="nome">Nome</label>
						<input name="txtnome" type="text" class="form-control" required id="nome">
					</div>		
					
					
				<div class="form-group">
				
						<label for="email">E-mail</label>
						<input name="txtemail" type="email" class="form-control" required id="email">
				</div>
					
				
				<div class="form-group">
				
						<label for="senha">Senha</label>
						<input name="txtsenha" type="password" class="form-control" required id="senha">
				</div>
					
				<div class="form-group">
				
						<label for="endereco">Endereço</label>
						<input name="txtendereco" type="text" class="form-control" required id="endereco">
				</div>
					
					
				<div class="form-group">
				
						<label for="cidade">Cidade</label>
						<input name="txtcidade" type="text" class="form-control" required id="cidade">
				</div>
					
					
				<div class="form-group">
				
						<label for="cep">CEP</label>
						<input name="txtcep" type="text" class="form-control" required id="cep">
				</div>
				
						
				<button type="submit" class="btn btn-lg btn-enter">
					
					<span> Cadastrar</span>
					
				</button>
				
				</form>
							
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>