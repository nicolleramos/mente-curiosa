<?php
include './php/verifica_login.php';

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            margin: 20px;
            margin-left: 30px;
            margin-right: 30px;
        }

        ion-icon {
            font-size: 25px;
            color: #3FB9D7;
        }

        img {
            margin-top: 10px;
            width: 80px;
            border-radius: 60%;
            margin-left: 10px;
        }

        h2,
        h4,
        a {
            color: #3FB9D7;
            margin-left: 5px;
        }

        p {
            font-size: 18px;
            font-weight: 500;
        }

        .edit {
            width: 25px;
        }

        .e-nome {
            display: flex;
            align-items: center;
            margin-bottom: -20px;
        }

        hr {
            border: 1px solid #F8F8F8;
        }

        a {
            text-decoration: none;
        }

    </style>
</head>

<body>

    <a href="./painel.php"><ion-icon name="chevron-back-outline"></ion-icon></a>
    <h2>Configurações dos Pais</h2>

    <div class="e-nome">
        <ion-icon name="mail-outline"></ion-icon>
        <h4><a href="editar-email.php">Mude o e-mail</a></h4>
    </div>
    <br>
    <hr>

    <div class="e-nome">
        <ion-icon name="lock-closed"></ion-icon>
        <h4 id="editarsenha">Mude a senha</h4>
    </div>
    <br>
    <hr>

    <div class="e-nome">
        <ion-icon name="log-out-outline"></ion-icon>
        <h4><a href="./php/logout.php">Sair da conta</a></h4>
    </div>
    <br>
    <hr>

    <div class="e-nome">
        <ion-icon class="excluir" name="trash"></ion-icon>
        <form id="deleteForm" action="./excluir-perfil.php" method="POST">
            <input type="hidden" name="action" value="delete-perfil">
            <h4><a id="deleteLink" href="#">Apagar a conta</a></h4>
        </form>
    </div>
    <br>
    <hr>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>

    <script>
        document.getElementById("editarsenha").addEventListener("click", function() {
            window.location.href = "./editar-senha.php";
        });

        document.getElementById('deleteLink').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter essa ação!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3FC3EE',
                cancelButtonColor: '#D9D9D9',
                confirmButtonText: 'Sim, excluir conta!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        });
    </script>

</body>

</html>