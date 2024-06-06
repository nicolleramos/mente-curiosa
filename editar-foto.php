<?php
include './php/verifica_login.php';
include './dados/conexao.php';

if (isset($_POST['remover_foto'])) {
    $id_usuario = $_SESSION['id'];

    $query = "UPDATE usuario SET foto_perfil = 'sem-foto.jpg' WHERE id = '$id_usuario'";
    if (mysqli_query($conexao, $query)) {
        $_SESSION['foto_perfil'] = 'sem-foto.jpg';
        header('Location: ./definicoes-do-perfil.php');
        exit();
    }
}

if (isset($_POST['atualizar'])) {
    $id_usuario = $_SESSION['id'];
    $arquivo = $_FILES['file'];
    $arquivon = explode('.', $arquivo['name']);

    if ($arquivon[sizeof($arquivon) - 1] != 'jpg') {
        echo "<script>alert('Não foi possível carregar essa imagem!!');</script>";
    } else {
        $nome_arquivo = $arquivo['name'];
        move_uploaded_file($arquivo['tmp_name'], './img/' . $nome_arquivo);

        $query = "UPDATE usuario SET foto_perfil = '$nome_arquivo' WHERE id = '$id_usuario'";
        if (mysqli_query($conexao, $query)) {
            $_SESSION['foto_perfil'] = $nome_arquivo;
            header('Location: ./definicoes-do-perfil.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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

        .box {
            display: inline;
        }

        .custom-file-upload {
            font-weight: 500;
        }

        .remove-file-button {
            border: none;
            margin-left: 5px;
            background-color: #3FB9D7;
            color: #FFF;
            font-weight: 600;
        }

        .apagar-foto {
            margin: 12px;
            background-color: #3FB9D7;
            padding: 12px;
            border-radius: 12px;
        }

        input[type="file"] {
            display: none;
        }

        a {
            text-decoration: none;
            color: #8475D6;
        }

        i {
            margin-right: 5px;
            margin-bottom: 10px;
            color: #8475D6;
            font-size: 45px;
        }

        .gravar {
            border: none;
            background-color: #8475D6;
            color: #FFF;
            font-weight: 600;
            padding: 10px;
            padding-left: 25px;
            padding-right: 25px;
            margin-left: 5px;
            margin: 4px;
            border-radius: 5px;
        }

        .d-ft {
            border: #8475D6 solid 1px;
            padding: 5px;
            border-radius: 3px;
            font-size: 15px;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <div class="container">
        <div class="box">
            <form action="" method="post" enctype="multipart/form-data">
            <i class="fa-solid fa-camera"></i>
                <div class="d-ft">
                    <label for="file-upload" id="file-label" class="custom-file-upload">Escolher nova foto de perfil</label>
                    <input id="file-upload" type="file" name="file" accept="image/*" onchange="updateLabel()">
                </div>
                <input type="submit" class="gravar" name="atualizar" value="Gravar">
            </form>

            <div class="apagar-foto">
                <form action="" method="post"><input type="submit" name="remover_foto" class="remove-file-button" value="Remover foto">
                </form>
            </div>

            <a href="./definicoes-do-perfil.php">Voltar</a>
        </div>
    </div>

    <script>
        function updateLabel() {
            const fileInput = document.getElementById('file-upload');
            const label = document.getElementById('file-label');
            if (fileInput.files.length > 0) {
                label.textContent = fileInput.files[0].name;
            }
        }
    </script>
</body>

</html>