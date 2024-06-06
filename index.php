<?php
session_start();

$imagens = array(
    "./img/dino0.jpeg",
    "./img/dino1.jpeg",
    "./img/dino2.jpeg",
    "./img/dino3.jpeg"
);
$imagem_aleatoria = $imagens[array_rand($imagens)];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>

    </style>
</head>

<body>

    <div id="login">
        <div class="caixa">

            <img src="<?php echo $imagem_aleatoria; ?>">
            <h1>Login</h1>

            <?php
            if (isset($_SESSION['nao_autenticado'])) :
            ?>
                <div class="mensagem-err">
                <ion-icon name="warning-outline"></ion-icon><p>usuário ou senha inválidos!!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>

            <form action="./php/login.php" method="POST">

                <div class="email">
                    <input type="email" placeholder="E-mail" name="email">
                </div>

                <div class="senha">
                    <input type="password" placeholder="Senha" name="senha">
                </div>

                <div class="entrar">
                    <p>Esqueceu a senha? <a href="#">Recupere aqui</a>.</p>
                    <button type="submit">Entrar</button>
                    <br>
                    <p>Se não tiver conta, <a href="cadastrar.php">Cadastra-se</a>!</p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
</body>

</html>