<?php
include './php/verifica_login.php';
include './dados/conexao.php';

if (isset($_POST['gravar'])) {
    $email_novo = $_POST['novo_email'];

    if (!empty($email_novo)) {
        $email = mysqli_real_escape_string($conexao, $email_novo);

        $id_usuario = $_SESSION['id'];

        $check_query = "SELECT id FROM usuario WHERE email = '$email' AND id != '$id_usuario'";
        $result = mysqli_query($conexao, $check_query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['usuario_existe'] = true;
            header('Location: editar-email.php');
            exit();
        } else {
            $query = "UPDATE usuario SET email = '$email' WHERE id = '$id_usuario'";

            if (mysqli_query($conexao, $query)) {
                $_SESSION['email'] = $email_novo;
                header('Location: editar-email.php');
                exit();
            }
        }
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

        .email-c {
            margin: 10px;
        }

        .email-c p {
            font-size: 15px;
            font-weight: 500;
            color: #219EBC;
        }

        .email-c label {
            color: #FAC232;
            font-weight: 500;
        }

        .email-n {
            margin-top: 20px;
        }

        .email-n label {
            color: #FAC232;
            font-weight: 500;
        }

        .email-n input {
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

        .email-n input:focus {
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
            <h2>Editar e-mail</h2>
            <?php
            if (isset($_SESSION['usuario_existe'])) :
            ?>
                <div class="mensagem">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <p>Este e-mail já está em uso.<br>Por favor, escolha outro!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['usuario_existe']);
            ?>
            <form action="" method="POST">
                <div class="email-c">
                    <label>E-mail atual</label>
                    <p><?php echo $_SESSION['email']; ?></p>
                </div>
                <div class="email-n">
                    <label for="email">Novo E-mail</label><br>
                    <input type="email" name="novo_email" placeholder="E-mail" required>
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