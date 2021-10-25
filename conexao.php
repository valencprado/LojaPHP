<?php 
$servidor = "Loacalhost";
$usuario = "ead";
$senha "123456";
$banco = "db_ead";

$cn = new PDO ("mysql:host=$servidor;dbname=$banco", $usuario,$senha );
?>