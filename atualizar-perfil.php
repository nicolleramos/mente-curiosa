<?php
include './php/verifica_login.php';
include './dados/conexao.php';

if (isset($_POST['gravar'])) {
    $novo_nome = $_POST['novo_nome'];

    if (!empty($novo_nome)) {
        $novo_nome = mysqli_real_escape_string($conexao, $novo_nome);

        $id_usuario = $_SESSION['id']; 
        $query = "UPDATE usuario SET crianca = '$novo_nome' WHERE id = '$id_usuario'";

        if (mysqli_query($conexao, $query)) {
            $_SESSION['crianca'] = $novo_nome;
            header('Location: ./definicoes-do-perfil.php');
            exit();
        }
    }
}

?>
