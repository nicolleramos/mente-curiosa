<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/ccadastrar.css">
</head>

<body>
    <div class="container">
        <div class="box">

            <img src="./img/dino-cad-2.jpg" width="190px">
            <h1>Cadastrar Criança</h1>

            <form action="./php/cadastro-da-crianca.php" method="POST" enctype="multipart/form-data">

                <div class="crianca">
                    <input type="text" name="nome_crianca" placeholder="Criança (Nome ou Apelido)" required>
                </div>

                <div class="dta_nasc">
                    <input type="date" name="data_nascimento" required>
                </div>

                <div class="genero">
                    <label>
                        <input type="radio" name="genero" value="Feminino" required> Feminino
                    </label>
                    <label>
                        <input type="radio" name="genero" value="Masculino" required> Masculino
                    </label>
                </div>

                <div class="n-autismo">
                    <label>Nível de autismo:</label><br>
                    <select name="nivel_autismo">
                        <option value="Nível 1 (Autismo leve)">Nível 1 (Autismo leve)</option>
                        <option value="Nível 2 (Autismo moderado)">Nível 2 (Autismo moderado)</option>
                        <option value="Nível 3 (Autismo severo)">Nível 3 (Autismo severo)</option>
                        <option value="Não se aplica/Não sei">Não se aplica/Não sei</option>
                    </select>
                </div>

                <input type="submit" name="submit" value="Cadastrar!">
            </form>
        </div>
    </div>
</body>

</html>