<?php 
session_start();
include_once '../dados/conexao.php';

if(isset($_POST['submit'])) {

    $responsavel = mysqli_real_escape_string($conexao, $_POST['nome_responsavel']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));
    $csenha = mysqli_real_escape_string($conexao, md5($_POST['csenha']));

    if($senha != $csenha) {
        $_SESSION['senha_incorreta'] = true;
        header('Location: ../cadastrar.php');
        exit();
    }

    $select = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($select) > 0) {
        $_SESSION['usuario_existe'] = true;
        header('Location: ../cadastrar.php');
        exit();
    } else {
        $insert = mysqli_query($conexao, "INSERT INTO `usuario` (responsavel, email, senha) VALUES ('$responsavel', '$email', '$senha')") or die('query failed');

        if($insert) {
            $id_usuario = mysqli_insert_id($conexao);
            $_SESSION['id_usuario'] = $id_usuario;
            header('Location: ../continuar-cadastro.php');
            exit();
        }
    }
}
?>