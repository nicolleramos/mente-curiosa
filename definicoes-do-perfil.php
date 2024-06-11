<?php
include './php/verifica_login.php';
include './dados/conexao.php';

$dta_nasc = strtotime($_SESSION['data_nascimento']);
$data_nascimento = date('d/m/Y', $dta_nasc);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/config.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        input[type="submit"] {
            margin-top: 15px;
            cursor: pointer;
            width: 120px;
            height: 40px;
            border-radius: 10px;
            border: none;
            background-color: #8475D6;
            color: #FFF;
            font-size: 15px;
            font-weight: 500;
        }

        .container {
            margin: 20px;
            margin-left: 30px;
            margin-right: 30px;
        }

        .voltar {
            margin-top: 13px;
            margin-right: 30px;
            font-size: 40px;
            color: #8475D6;
        }

        ion-icon {
            font-size: 23px;
            color: #8475D6;
        }

        i {
            font-size: 24px;
            color: #8475D6;
        }

        img {
            margin-top: 15px;
            margin-bottom: 10px;
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            object-position: center;
            margin-left: 15px;
            border: #F8F8F8 solid 3px;
        }

        h2,
        h4 {
            color: #8475D6;
            margin-left: 5px;
        }

        p {
            font-size: 18px;
            font-weight: 500;
        }

        .edit {
            width: 25px;
        }

        .e-nome,
        .e-data,
        .e-autismo {
            display: flex;
            align-items: center;
            margin-bottom: -20px;
        }

        .c-perfil {
            background-color: #8475D6;
            display: flex;
            padding-right: 20px;
            border-radius: 20px;
            align-items: center;
        }

        body.dark-mode  .c-perfil {
            background-color: #97D1DF;
        }

        .c-perfil i {
            margin-left: 5px;
            margin-right: 5px;
        }

        .c-perfil a {
            margin-left: 5px;
            margin-bottom: -5px;
            font-weight: 600;
            color: #F8F8F8;
        }

        hr {
            border: 1px solid #F8F8F8;
        }

        a {
            text-decoration: none;
            color: #1b1b1b;
        }

        input {
            font-size: 18px;
            margin-top: 10px;
            width: 220px;
            height: 35px;
            border-radius: 5px;
            padding: 10px;
            font-weight: 600;
            border: #8475D6 solid 2px;
        }

        input:focus {
            outline-color: #8475D6;
        }

        body.dark-mode {
            background-color: #081B22;
        }

        body.dark-mode p {
            color: #FFF;
        }

        body.dark-mode {
            background-color: #081B22;
        }

        body.dark-mode p {
            color: #FFF;
        }

        body.dark-mode .voltar,
        body.dark-mode ion-icon,
        body.dark-mode i,
        body.dark-mode h2,
        body.dark-mode h4,
        body.dark-mode input {
            color: #3FB9D7;
        }

        body.dark-mode input[type="submit"] {
            background-color: #3FB9D7;
            color: #FFF;
        }

        body.dark-mode input {
            border-color: #3FB9D7;
        }

        body.dark-mode input:focus {
            outline-color: #3FB9D7;
        }
    </style>
</head>

<body>

    <a href="./painel.php"><ion-icon class="voltar" name="chevron-back-outline"></ion-icon></a>

    <div class="container">
        <h2>Definições de perfil</h2>

        <form action="./atualizar-perfil.php" method="post">
            <div class="c-perfil">
                <?php $imagem = $_SESSION['foto_perfil']; ?>
                <img src="./img/<?php echo $imagem; ?>">
                <a href="./editar-foto.php"><i class="fa-solid fa-pen-to-square" style="color: #FFF;"></i>Editar foto</a>
            </div>

            <br>
            <div class="e-nome">
                <i class="fa-solid fa-pen-to-square"></i>
                <h4>Mude o nome da Criança</h4>
            </div>
            <input type="text" name="novo_nome" value="<?php echo $_SESSION['crianca']; ?>">
            <hr>

            <div class="e-data">
                <i class="fa-solid fa-pen-to-square"></i>
                <h4>Mude o gênero</h4>
            </div>
            <p><?php echo $_SESSION['genero']; ?></p>
            <hr>

            <div class="e-data">
                <i class="fa-solid fa-pen-to-square"></i>
                <h4>Mude a data de nascimento</h4>
            </div>
            <p><?php echo $data_nascimento; ?></p>
            <hr>

            <div class="e-autismo">
                <ion-icon name="extension-puzzle"></ion-icon>
                <h4>Mude o nível de autismo</h4>
            </div>
            <p><?php echo $_SESSION['nivel_autismo']; ?></p>
            <hr>

            <input type="submit" name="gravar" value="Gravar">
        </form>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
            }
        });
    </script>
</body>

</html>