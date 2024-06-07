<?php
include './php/verifica_login.php';
include './dados/conexao.php';

if (isset($_POST['gravar'])) {

    $senha_antiga = $_POST['antiga_senha'];
    $senha_novo = $_POST['novo_senha'];
    $senha_confirme = $_POST['confirme_senha'];

    $id_usuario = $_SESSION['id'];

    $query_antiga = "SELECT senha FROM usuario WHERE id = '$id_usuario'";

    $result = mysqli_query($conexao, $query_antiga);
    $usuario = mysqli_fetch_assoc($result);

    if ($usuario && md5($senha_antiga) === $usuario['senha']) {
        if (!empty($senha_novo) && $senha_novo === $senha_confirme) {
            $senha_hash = md5($senha_novo);

            $query = "UPDATE usuario SET senha = '$senha_hash' WHERE id = '$id_usuario'";

            if (mysqli_query($conexao, $query)) {
                $_SESSION['mensagem'] = "Senha editada com sucesso!";
                $_SESSION['tipo_mensagem'] = "sucesso";
                header('Location: editar-senha.php');
                exit();
            } else {
                $_SESSION['mensagem'] = "Erro ao atualizar a senha.";
                $_SESSION['tipo_mensagem'] = "erro";
                header('Location: editar-senha.php');
                exit();
            }
        } else {
            $_SESSION['mensagem'] = "As senhas novas não coincidem ou estão vazias!";
            $_SESSION['tipo_mensagem'] = "erro";
            header('Location: editar-senha.php');
            exit();
        }
    } else {
        $_SESSION['mensagem'] = "A senha antiga está incorreta!";
        $_SESSION['tipo_mensagem'] = "erro";
        header('Location: editar-senha.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        .container {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: #219EBC;
        }

        .senha-c {
            margin: 10px;
        }

        .senha-c p {
            font-size: 30px;
            font-weight: 500;
            color: #219EBC;
        }

        .senha-c label {
            color: #FAC232;
            font-weight: 500;
        }

        .senha-n {
            margin-top: 20px;
        }

        .senha-n label, 
        .senha-a label {
            color: #FAC232;
            font-weight: 500;
        }

        .senha-n input, 
        .senha-a input,
        .senha-c input {
            margin-top: 5px;
            border-radius: 10px;
            border: none;
            width: 250px;
            height: 40px;
            padding-left: 15px;
            font-size: 15px;
            background-color: #EDEDEE;
            color: #979797;
            font-weight: 500;
        }

        .senha-n input:focus, 
        .senha-a input:focus,
        .senha-c input:focus {
            outline-color: #FAC232;
        }

        input[type="submit"] {
            margin-top: 15px;
            cursor: pointer;
            width: 120px;
            height: 40px;
            border-radius: 10px;
            border: none;
            background-color: #219EBC;
            color: #FFF;
            font-size: 15px;
            font-weight: 500;
        }

        .mensagem {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mensagem p {
            color: #219EBC;
            font-weight: 500;
            margin-left: 5px;
            font-size: 14px;
        }

        ion-icon {
            font-size: 20px;
            color: #219EBC;
        }

        a {
            text-decoration: none;
            color: #219EBC;
            font-weight: 500;
        }

        .voltar p {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="box">
            <h2>Editar Senha</h2>
            <?php
            if (isset($_SESSION['mensagem'])) :
            ?>
                <div class="mensagem">
                    <?php if ($_SESSION['tipo_mensagem'] == 'sucesso') : ?>
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                        <p><?php echo $_SESSION['mensagem']; ?></p>
                    <?php else : ?>
                        <ion-icon name="alert-circle-outline"></ion-icon>
                        <p><?php echo $_SESSION['mensagem']; ?></p>
                    <?php endif; ?>
                </div>
            <?php
            endif;
            unset($_SESSION['mensagem']);
            unset($_SESSION['tipo_mensagem']);
            ?>
            <form action="" method="POST">
                <div class="senha-c">
                    <label>Senha atual</label>
                    <br>
                    <input type="password" name="antiga_senha" placeholder="Digite sua senha atual" required>
                </div>
                
                <div class="senha-n">
                    <label for="senha">Nova Senha</label><br>
                    <input type="password" name="novo_senha" placeholder="Senha" required>
                </div>

                <br>
                <div class="senha-a">
                    <label for="senha">Confirme a Senha</label><br>
                    <input type="password" name="confirme_senha" placeholder="Confirme a senha" required>
                </div>

                <input type="submit" name="gravar" value="Gravar">
                <div class="voltar">
                    <p><a href="./configuracoes.php">Voltar</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
</body>

</html>
