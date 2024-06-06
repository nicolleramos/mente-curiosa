<?php
session_start();
include_once '../dados/conexao.php';

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: ../index.php');
	exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senhamd5 = md5($senha);

$query = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senhamd5}'";


$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) == 1) {

	$row = mysqli_fetch_assoc($result);

	//**dados do usuário logado */
	$_SESSION['id'] = $row['id'];
	$_SESSION['responsavel'] = $row['responsavel'];
	$_SESSION['crianca'] = $row['crianca'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['senha'] = $row['senha'];
	$_SESSION['data_nascimento'] = $row['data_nascimento'];
	$_SESSION['genero'] = $row['genero'];
	$_SESSION['nivel_autismo'] = $row['nivel_autismo'];
	$_SESSION['foto_perfil'] = $row['foto_perfil'];

	header('Location: ../painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}