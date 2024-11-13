<?php
    include_once('config.php');

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco) VALUES ('$nome', '$senha', '$email', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco')");

        header('Location: login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | Cosmic Dragon</title>
    <style>
        :root {
            --background-dark: linear-gradient(to right, #000000, #2c2c2c);
            --background-light: linear-gradient(to right, #ffffff, #e0e0e0);
            --text-color-dark: #fff;
            --text-color-light: #000;
            --glow-color: rgba(128, 0, 128, 0.3);
            --button-bg-color: #4b4b4b;
            --button-hover-color: #7a7a7a;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background-dark);
            color: var(--text-color-dark);
            transition: background 0.5s, color 0.5s;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .box {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 15px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-sizing: border-box;
            transition: background-color 0.5s;
            color: inherit;
            box-shadow: 0 0 15px var(--glow-color);
        }

        .box:focus-within {
            box-shadow: 0 0 20px var(--glow-color), 0 0 20px var(--glow-color);
        }

        fieldset {
            border: 3px solid dodgerblue;
            padding: 20px;
            transition: color 0.5s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        legend {
            border: 1px solid dodgerblue;
            padding: 10px;
            background-color: dodgerblue;
            border-radius: 8px;
            font-size: 20px;
            color: white;
        }

        .inputBox {
            position: relative;
            margin: 10px 0;
            text-align: left;
            width: 100%;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid currentColor;
            outline: none;
            color: inherit;
            font-size: 15px;
            width: 100%;
            padding: 8px;
            transition: box-shadow 0.3s ease;
        }

        .inputUser:focus {
            box-shadow: 0 0 8px var(--glow-color);
        }

        .labelInput {
            position: absolute;
            top: 10px;
            left: 0px;
            pointer-events: none;
            transition: 0.5s;
            color: inherit;
        }

        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        #submit {
            background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            transition: background 0.3s;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
        }

        .backButton {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: transparent;
            color: inherit;
            border: 2px solid currentColor;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
        }

        .backButton:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .toggle-theme {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #BBBBBB;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: #000;
            font-weight: bold;
            transition: background 0.3s;
        }

        .toggle-theme:hover {
            background-color: #888888;
            color: white;
        }

        .box img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        /* Estilo dos botões de seleção de gênero */
        .radio-group {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
            color: inherit;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            font-size: 14px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        .radio-group label::before {
            content: '';
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 8px;
            border-radius: 50%;
            border: 2px solid currentColor;
            transition: background-color 0.3s;
        }

        .radio-group input[type="radio"]:checked + label::before {
            background-color: dodgerblue;
        }
    </style>
</head>
<body>
    <a class="backButton" href="home.php">Voltar</a>
    <button class="toggle-theme" onclick="toggleTheme()">Modo Claro</button>

    <div class="box">
        <img src="Logo.png" alt="Logo Cosmic Dragon">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cosmic Dragon</b></legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <div class="radio-group">
                    <input type="radio" id="feminino" name="genero" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="masculino" name="genero" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <input type="radio" id="outro" name="genero" value="outro" required>
                    <label for="outro">Outro</label>
                </div>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <script>
        let darkMode = true;

        function toggleTheme() {
            darkMode = !darkMode;
            document.body.style.background = darkMode ? "var(--background-dark)" : "var(--background-light)";
            document.body.style.color = darkMode ? "var(--text-color-dark)" : "var(--text-color-light)";
            document.querySelector('.toggle-theme').textContent = darkMode ? "Modo Claro" : "Modo Escuro";

            const inputElements = document.querySelectorAll('.inputUser');
            inputElements.forEach(input => {
                input.style.color = darkMode ? "var(--text-color-dark)" : "var(--text-color-light)";
            });

            document.querySelector('.box').style.backgroundColor = darkMode ? "rgba(0, 0, 0, 0.5)" : "rgba(255, 255, 255, 0.7)";
        }
    </script>
</body>
</html>
