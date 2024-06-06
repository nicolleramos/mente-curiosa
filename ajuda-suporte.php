<?php
include './php/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/config.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            margin: 20px;
            margin-left: 30px;
            margin-right: 30px;
        }

        h2,
        h4 {
            color: #3FB9D7;
        }

        .lgpd,
        .sobre {
            display: flex;
            align-items: center;
        }

        .lgpd p a,
        .sobre p a {
            margin-left: 5px;
            color: #3FB9D7;
            text-decoration: none;
            font-weight: 700;
        }

        ion-icon {
            font-size: 30px;
            color: #3FB9D7;
        }

        hr {
            border: 1px solid #F8F8F8;
        }
    </style>
</head>

<body>

    <a href="./painel.php"><ion-icon name="chevron-back-outline"></ion-icon></a>
    <h2>Ajuda & Suporte</h2>

    <div class="lgpd">
        <ion-icon name="document-text-outline"></ion-icon>
        <p><a href="./doc/Política de Privacidade (1).pdf" target="_blank">Esclarecimento sobre a LGPD</a></p>
    </div>
    <hr>

    <div class="sobre">
        <ion-icon name="people-circle-outline"></ion-icon>
        <p><a href="./sobre.html">Sobre nós</a></p>
    </div>
    <hr>

    <div class="sobre">
    <ion-icon name="help-circle-outline"></ion-icon>
        <p><a href="#">Como usar o App?</a></p>
    </div>
    <hr>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
</body>

</html>