<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        /* Variáveis de cores para modo claro e escuro */
        :root {
            --background-dark: linear-gradient(to right, #000000, #2c2c2c);
            --background-light: linear-gradient(to right, #ffffff, #e0e0e0);
            --text-color-dark: #fff;
            --text-color-light: #000;
        }

        /* Configurações gerais */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background-dark);
            color: var(--text-color-dark);
            transition: background 0.5s, color 0.5s;
        }

        /* Estilização da caixa */
        div {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: inherit;
            transition: background-color 0.5s;
        }

        /* Campos de entrada */
        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            width: 100%;
            border-radius: 5px;
        }

        /* Botão de envio */
        .inputSubmit {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .inputSubmit:hover {
            background-color: deepskyblue;
        }

        /* Botão Voltar estilizado */
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

        /* Botão de alternância de modo */
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
    </style>
</head>
<body>
    <a class="backButton" href="home.php">Voltar</a>
    <button class="toggle-theme" onclick="toggleTheme()">Modo Claro</button>

    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>

    <script>
        let darkMode = true;

        function toggleTheme() {
            darkMode = !darkMode;
            if (darkMode) {
                document.body.style.background = "var(--background-dark)";
                document.body.style.color = "var(--text-color-dark)";
                document.querySelector('.toggle-theme').textContent = "Modo Claro";
            } else {
                document.body.style.background = "var(--background-light)";
                document.body.style.color = "var(--text-color-light)";
                document.querySelector('.toggle-theme').textContent = "Modo Escuro";
            }
        }
    </script>
</body>
</html>
