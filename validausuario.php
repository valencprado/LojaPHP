<?php
include 'conexao.php';

//adicionando session 
session_start(); 

$Vemail = $_POST['txtemail'];
$Vsenha = $_POST['txtsenha'];



//nessa query usei o operador "and" ou seja o resultado só será verdadeiro caso as duas informações estiverem certas: "email" e "senha"//
$consulta = $cn->query("select cd_usuario, nome_usuario, ds_email, ds_senha, ds_status from tbl_usuario where ds_email ='$Vemail' and ds_senha = '$Vsenha'");

//se a minha variável consulta, tiver um número de linhas = 1, deu tudo certo já que o usuário vai ter apenas um email (1 linha no banco)//
if ($consulta-> rowCount() == 1){
    //criação da variavel de sessão//
    $exibeUsuario= $consulta->fetch(PDO::FETCH_ASSOC);

    if($exibeUsuario['ds_status'] == 0){
        $_SESSION['ID'] =$exibeUsuario['cd_usuario'];
        $_SESSION['Status']=0;
        //se sim, o usuário será redirecionado para o index de novo//
        header('location:index.php');
    }
    else{
        $_SESSION['ID'] =$exibeUsuario['cd_usuario'];
        $_SESSION['Status']=1;
        header('location:index.php');
    }
    
   
}
else {

    header('location:erro.php');
}


?>