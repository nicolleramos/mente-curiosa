<?php
$servidor = "mysql380.umbler.com:41890";
	$usuario = "dada";
	$senha = "dada123teste";
	$dbname = "dada";
	$conexao = @mysqli_connect($servidor, $usuario, $senha, $dbname ) 
	or die ("Problemas com a conexão do Banco de Dados");
?>