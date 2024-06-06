<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cadastrar.css">
    <style>
        p {
            margin: 13px;
            font-size: 12px;
            color: #222222;
            font-weight: 500;
        }

        a {
            color: #FFBD3E;
            text-decoration: none;
        }

        .box img {
            width: 190px;
            border-radius: 100%;
            object-fit: cover;
        }

        .mensagem-err p {
            color: #FFBD3E;
            font-weight: 500;
            margin-left: 5px;
            font-size: 14px;
        }

        ion-icon {
            font-size: 20px;
            color: #FFBD3E;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">

            <img src="./img/dino-cad-1.jpg">
            <h1>Cadastrar</h1>
            <?php
            //** mensagens de aviso - cadastro
            if (isset($_SESSION['usuario_existe'])) :
            ?>
                <div class="mensagem-err">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <p>Este e-mail já está em uso.</p>
                </div>
            <?php
            endif;
            unset($_SESSION['usuario_existe']);

            if (isset($_SESSION['senha_incorreta'])) :
            ?>
                <div class="mensagem-err">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <p>As senhas não correspondem.</p>
                </div>
            <?php
            endif;
            unset($_SESSION['senha_incorreta']);
            ?>

            <form action="./php/confirmar-novo-usuario.php" method="POST">

                <div class="responsavel">
                    <input type="text" name="nome_responsavel" placeholder="Responsável" required>
                </div>

                <div class="email">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="senha">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <div class="csenha">
                    <input type="password" name="csenha" placeholder="Confirmar Senha" required>
                </div>

                <div class="termos">
                    <p>Ao clicar em Continuar abaixo, você concorda com nossos <a href="./politicas-de-privacidade.html">Termos & Condições e Política de Privacidade</a>.</p>
                </div>
                <input type="submit" name="submit" value="Continuar">

                <div class="login">
                    <p>Se já possuir uma conta, <a href="index.php">Faça login</a>!</p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
</body>

</html>