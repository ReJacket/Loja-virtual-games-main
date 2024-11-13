<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmic Dragon | CD</title>
    <style>
        /* Variáveis de cores para modo claro e escuro */
        :root {
            --primary-color-light: linear-gradient(to right, #141927, #4b3b69);
            --primary-color-dark: linear-gradient(to right, #000000, #3d1f5f);
            --button-color: white;
            --text-color: white;
        }
        
        /* Configurações gerais */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--primary-color-light);
            text-align: center;
            color: var(--text-color);
            transition: background 0.5s, color 0.5s;
        }
        
        /* Estilização da caixa com animação */
        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(128, 0, 128, 0.6); /* Glow roxo */
            animation: fadeIn 0.5s ease;
            transition: box-shadow 0.3s;
        }

        .box:hover {
            box-shadow: 0 0 25px rgba(128, 0, 128, 0.9);
        }

        /* Animação de fade */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Botões */
        a {
            text-decoration: none;
            color: var(--button-color);
            border: 2px solid #BB86FC;
            border-radius: 10px;
            padding: 12px 20px;
            margin: 5px;
            display: inline-block;
            transition: background 0.3s, color 0.3s;
        }
        
        a:hover {
            background-color: #BB86FC;
            color: #1c1c1c;
        }

        /* Botão de alternância de modo */
        .toggle-theme {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background-color: #BB86FC;
            color: #1c1c1c;
            transition: background 0.3s;
        }

        .toggle-theme:hover {
            background-color: #9370DB;
            color: white;
        }
    </style>
</head>
<body>
    <button class="toggle-theme" onclick="toggleTheme()">Modo Escuro</button>

    <h1>Bem-vindo ao site da Cosmic Dragon</h1>
    <h2>Faça o login ou cadastre-se</h2>
    <div class="box">
        <a href="login.php">Login</a>
        <a href="formulario.php">Cadastre-se</a>
    </div>

    <script>
        let darkMode = false;

        function toggleTheme() {
            darkMode = !darkMode;
            if (darkMode) {
                document.body.style.background = "var(--primary-color-dark)";
                document.body.style.color = "var(--text-color)";
                document.querySelector('.toggle-theme').textContent = "Modo Claro";
            } else {
                document.body.style.background = "var(--primary-color-light)";
                document.body.style.color = "var(--text-color)";
                document.querySelector('.toggle-theme').textContent = "Modo Escuro";
            }
        }
    </script>
</body>
</html>
