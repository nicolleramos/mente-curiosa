<?php
session_start();
include_once '../dados/conexao.php';

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    if (isset($_POST['submit'])) {

        $crianca = mysqli_real_escape_string($conexao, $_POST['nome_crianca']);
        $data_nascimento = $_POST['data_nascimento'];
        $genero = mysqli_real_escape_string($conexao, $_POST['genero']);
        $nivel_autismo = mysqli_real_escape_string($conexao, $_POST['nivel_autismo']);

        $update = mysqli_query($conexao, "UPDATE `usuario` SET crianca = '$crianca', data_nascimento = '$data_nascimento', genero = '$genero', nivel_autismo = '$nivel_autismo', foto_perfil = 'sem-foto.jpg' WHERE id = $id_usuario") or die('query failed');

        if ($update) {
            header('Location: ../index.php');
            exit();
        }
    }
}
