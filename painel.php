<?php
include './php/verifica_login.php';
include './dados/conexao.php';

$query = "SELECT estrelas FROM estrelas WHERE id_usuario = " . $_SESSION['id'];
$resultado = $conexao->query($query);
if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $estrelas = $row['estrelas'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/painel.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            background-size: cover;
            background-position: center;
            background: #B9E2E5;
        }

        .container-c {
            align-items: center;
            justify-content: center;
        }

        .personagem {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .personagem img {
            margin: 110px;
            margin-top: 130px;
            margin-bottom: 0px;
            width: 220px;
        }

        .card-trilha {
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: -10px;
        }

        .menu .item i {
            margin-right: 11px;
            font-size: 20px;
            color: #3FB9D7;
        }

        .side-bar {
            background-color: #FFF;
            width: 250px;
            left: -250px;
            height: 100vh;
            position: fixed;
            top: 0;
            overflow-y: auto;
            transition: 0.6s ease;
            transition-property: left;
            border-radius: 0 20px 20px 0;
        }

        body.dark-mode .side-bar {
            background-color: #223B46;
        }

        header img {
            width: 100px;
            height: 100px;
            margin-top: 44px;
            margin-bottom: 10px;
            object-fit: cover;
            border-radius: 60%;
            object-position: center;
            border: 3px #3FB9D7 solid;
        }

        body.dark-mode header img {
            border-color: #FFE6AA;
        }

        .fechar-btn {
            position: absolute;
            color: #FFF;
            font-size: 23px;
            right: 0px;
            margin: 20px;
            cursor: pointer;
        }

        header h4 {
            text-align: center;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 50px;
        }

        header hr {
            width: 70%;
            margin-left: 40px;
            margin-top: -35px;
            border: 0.1px #F8F8F8 solid;
        }

        .menu {
            position: relative;
            cursor: pointer;
        }

        .menu .item a {
            color: #3FB9D7;
            font-size: 16px;
            text-decoration: none;
            display: block;
            padding: 2px 30px;
            line-height: 60px;
            margin-top: 10px;
            margin-bottom: -30px;
        }

        .menu-btn img {
            position: relative;
            cursor: pointer;
            width: 75px;
            height: 75px;
            object-fit: cover;
            object-position: center;
            border-radius: 60%;
            border: 3px #FFF solid;
        }

        .menu-btn {
            margin-right: 10px;
        }

        .side-bar.active {
            left: 0;
        }

        .perfil {
            position: absolute;
            display: flex;
            align-items: center;
            background-color: #3FB9D7;
            padding-left: 10px;
            padding-top: 10px;
            padding-bottom: 5px;
            border-radius: 0 0 20px 20px;
            width: 100%;
        }

        body.dark-mode .perfil {
            background-color: #223B46;
        }

        .perfil p {
            margin: 0;
            color: #fff;
            font-weight: 700;
            font-size: 16px;
        }

        .perfil p a {
            font-weight: 400;
            font-size: 11px;
            background-color: #bbe8f0;
            color: #253f44;
            border-radius: 20px;
            padding: 2px 5px 2px 5px;
        }

        .categoria {
            color: #3FB9D7;
            margin: 25px;
            font-weight: 800;
        }

        .container-c {
            padding-bottom: 15px;
        }

        .trilhas {
            display: flex;
            align-items: center;
        }

        .trilhas p {
            margin-top: 40px;
            font-size: 24px;
            color: #FFF;
            font-weight: 700;
        }

        .pegadas {
            padding-bottom: 50px;
        }

        header {
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .estrelinhas {
            display: flex;
        }

        .estrelinhas p {
            color: #FFCD51;
            font-size: 19px;
        }

        .estrelinhas img {
            height: 20px;
            margin-top: 2px;
            margin-right: 2px;
        }

        body.dark-mode {
            min-height: 100vh;
            background-size: cover;
            background-position: center;
            background: #081B22;
        }
        
    </style>
</head>

<body>

    <div class="perfil">
        <div class="menu-btn">
            <?php $imagem = $_SESSION['foto_perfil']; ?>
            <img src="./img/<?php echo $imagem; ?>">
        </div>

        <div class="status">
            <p><?php echo $_SESSION['crianca']; ?></p>
            <div class="estrelinhas">
                <img src="./img/estrelas-1.png" width="20px">
                <p><?php echo $estrelas; ?></p>
            </div>
        </div>
    </div>

    <div class="side-bar">
        <header>
            <div class="fechar-btn">
                <i class="fa-solid fa-bars" style="color: #3FB9D7" ></i>
            </div>

            <img src="./img/<?php echo $imagem; ?>" alt="PerfildaCriança">

            <h4 style="color: #3FB9D7"><?php echo $_SESSION['crianca']; ?><br>

                <a href="./definicoes-do-perfil.php" style="text-decoration: none; font-size: 12px; font-weight: 400; color: #3FB9D7;"><i class="fa-solid fa-star" style="font-size: 12px;"></i> Editar Perfil</a>
            </h4>
            <hr>
        </header>

        <div class="menu">
            <div class="item">
                <a><i class="fa-solid fa-meteor"></i>Desempenho</a>
            </div>
            <div class="item">
                <a id="config"><i class="fa-solid fa-gears"></i>Configuração</a>
            </div>
            <div class="item">
                <a id="ajuda"><i class="fa-solid fa-user-astronaut"></i>Ajuda e Suporte</a>
            </div>
            <div class="item">
                <a id="theme-toggle" onclick="toggleDarkMode()"><i class="fa-regular fa-moon"></i>Tema: <b>Escuro</b></a>
            </div>
        </div>
    </div>

    <div class="container-c">
        <div class="personagem">
            <img src="./img/status (3).png" id="status">
        </div>

        <div class="trilhas">
            <p class="categoria">Trilhas para explorar!</p>
        </div>
    </div>

    <div class="pegadas">
        <div class="card-trilha">
            <img src="./img/pe.png" width="320px" id="Atividade">
        </div>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="./js/painel.js"></script>
    <script>
        document.getElementById("config").addEventListener("click", function() {
            window.location.href = "./configuracoes.php";
        });

        document.getElementById("ajuda").addEventListener("click", function() {
            window.location.href = "./ajuda-suporte.php";
        });

        document.getElementById("Atividade").addEventListener("click", function() {
            window.location.href = "./atividades1/screens/modulo-1.html";
        });

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            var themeToggle = document.getElementById('theme-toggle');
            var icon = themeToggle.querySelector('i');
            var text = themeToggle.querySelector('b');
            if (document.body.classList.contains('dark-mode')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                text.textContent = 'Claro';
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                text.textContent = 'Escuro';
            }
        }
    </script>

</body>

</html>