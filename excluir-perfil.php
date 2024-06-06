<?php 
include './php/verifica_login.php';
include './dados/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete-perfil') {

    if (isset($_SESSION['id'])) {
        $id_usuario = $_SESSION['id']; 

        $query = "DELETE FROM usuario WHERE id = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            header("Location: ./index.php");
            exit();
        } else {
            echo "<script>alert('Algo deu errado ao tentar excluir conta!!');</script>";
        }
        $stmt->close();
    }
}
$conexao->close();
?>
