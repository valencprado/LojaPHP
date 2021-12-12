<link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">

<?php
// iniciando a sessão, pois precisamos pegar o cd do usuario logado para salvar na tabela de vendas no campo cd_cliiente
session_start();  

include 'conexao.php';


$data = date('Y-m-d');  // variavel que vai pegar a data do dia (ano mes dia -padrão do mysql)
$ticket = uniqid();  // gerando um ticket com função uniqid(); 	gera um id unico    
$cd_user = $_SESSION['ID'];  //recebendo o codigo do usuário logado, nesta pagina o usuario ja esta logado pois, em do carrinho de compra

//// criando um loop para sessão carrinho q recebe o $cd e a quantidade
foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $cn->query("SELECT vl_preco FROM tbl_disco WHERE cd_disco='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['vl_preco'];
    
	
	$inserir = $cn->query("INSERT INTO tbl_venda(no_Ticket,cd_cliente,cd_disco,qt_disco,vl_item,dt_venda)  VALUES
	('$ticket','$cd_user','$cd','$qnt','$preco','$data')");
	
}

include 'fim.php';


?>