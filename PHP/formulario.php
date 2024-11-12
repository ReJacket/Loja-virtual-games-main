<?php
session_start();
if (isset($_POST['submit'])) {
    include_once 'PHP/config.php';

    // Recebe os dados do formulário com proteção contra injeção SQL
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['genero']);
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);

    // Verificar se o e-mail já está cadastrado
    $checkEmail = "SELECT email FROM usuarios WHERE email = '$email'";
    $resultCheck = mysqli_query($conexao, $checkEmail);
    
    if (mysqli_num_rows($resultCheck) > 0) {
        echo "Este e-mail já está cadastrado. Por favor, escolha outro.";
    } else {
        // Consulta SQL para inserir os dados
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha, telefone, sexo, data_nasc, cidade, estado, endereco) 
                VALUES ('$nome', '$email', '$senha', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco')");

        if ($result) {
            echo "Dados inseridos com sucesso!";
            // Redireciona para a página de login após cadastro bem-sucedido
            header('Location: login.php');
            exit(); // Encerra o script após o redirecionamento
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conexao);
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario | GN</title>
    <style>
        /* Estilo geral */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(0, 0, 0), rgb(17, 17, 17));
            /* Gradiente com tons de preto */
            color: white;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            overflow-y: auto;
        }

        /* Caixa do formulário */
        .box {
            position: relative;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 15px;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: floatUp 2s ease-out;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
            /* Adicionando transição para a opacidade */
            margin-top: 20px;
        }

        .box:focus-within {
            background-color: rgba(0, 0, 0, 0.8);
            /* Torna a caixa mais visível quando focada */
            box-shadow: 0 0 15px rgba(128, 0, 128, 0.7);
            /* Brilho roxo suave ao redor da caixa */
        }

        /* Animação de flutuação */
        @keyframes floatUp {
            0% {
                transform: translateY(50%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Estilo para o campo do legend e border */
        fieldset {
            border: 3px solid purple;
            padding: 20px;
            border-radius: 10px;
        }

        /* Efeito de brilho animado no <legend> */
        @keyframes glow {
            0% {
                box-shadow: 0 0 5px rgba(128, 0, 128, 0.2), 0 0 10px rgba(128, 0, 128, 0.1), 0 0 15px rgba(128, 0, 128, 0.05);
            }

            50% {
                box-shadow: 0 0 10px rgba(128, 0, 128, 0.4), 0 0 20px rgba(128, 0, 128, 0.3), 0 0 30px rgba(128, 0, 128, 0.2);
            }

            100% {
                box-shadow: 0 0 5px rgba(128, 0, 128, 0.2), 0 0 10px rgba(128, 0, 128, 0.1), 0 0 15px rgba(128, 0, 128, 0.05);
            }
        }

        /* Aplicando o brilho suave e animado ao legend */
        legend {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid purple;
            padding: 10px;
            text-align: center;
            background-color: purple;
            border-radius: 8px;
            animation: glow 2s ease-in-out infinite;
            /* Animação pulsante do brilho */
        }

        .logo {
            width: 55px;
            /* Tamanho da logo */
            height: auto;
            margin-right: 10px;
            /* Espaçamento à direita da logo */
        }

        /* Estilo do input e label */
        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
            padding: 5px;
        }

        .labelInput {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
            transition: 0.5s;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: purple;
        }

        #data_nascimento {
            width: 100%;
            /* Para garantir que o campo ocupe toda a largura disponível */
            padding: 10px;
            border: 2px solid rgba(128, 0, 128, 0.5);
            /* Borda roxa suave */
            border-radius: 8px;
            /* Bordas arredondadas */
            background-color: rgba(0, 0, 0, 0.6);
            /* Fundo semitransparente */
            color: white;
            font-size: 15px;
            transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
            box-sizing: border-box;
            /* Garante que o padding não afete o tamanho total do campo */
        }

        #data_nascimento:focus {
            border-color: rgba(128, 0, 128, 1);
            /* Cor roxa mais forte ao focar */
            background-color: rgba(0, 0, 0, 0.8);
            /* Fundo mais escuro quando o campo é focado */
            outline: none;
            /* Retira o contorno padrão do navegador */
        }

        #submit {
            background-image: linear-gradient(to right, rgb(247, 5, 5), rgb(183, 0, 255));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-image 0.3s ease;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(116, 23, 23), rgb(99, 30, 126));
        }

        /* Estilos para os campos de seleção de gênero (radios) */
        p {
            margin: 10px 0;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]+label {
            position: relative;
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 10px 30px;
            margin: 5px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="radio"]:checked+label {
            background-color: purple;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        input[type="radio"]:checked+label::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 18px;
        }

        input[type="radio"]:hover+label {
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* Responsividade */
        @media screen and (max-width: 768px) {
            .box {
                width: 80%;
                /* Ajusta a largura da caixa no celular */
            }

            #data_nascimento {
                width: 100%;
                /* Garante que o campo ocupe toda a largura */
            }
        }

        fieldset {
            padding: 15px;
        }

        #submit {
            font-size: 14px;
        }

        .inputBox {
            margin-bottom: 15px;
        }

        input[type="radio"]+label {
            font-size: 14px;
            padding: 8px 20px;
        }

        /* Estilos para o modo claro */
        body.light-mode {
            background-image: linear-gradient(to right, rgb(255, 255, 255), rgb(200, 200, 200));
            color: black;
        }

        /* Estilo do input no modo claro */
        body.light-mode .inputUser {
            color: black;
            border-bottom: 1px solid black;
            background-color: rgba(255, 255, 255, 0.8);
        }


        .light-mode .box {
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
        }

        .light-mode #data_nascimento {
            background-color: rgba(255, 255, 255, 0.6);
            color: black;
            border: 2px solid rgba(0, 0, 0, 0.5);
        }

        .light-mode #submit {
            background-image: linear-gradient(to right, rgb(247, 5, 5), rgb(0, 255, 255));
        }

        /* Estilos para o modo escuro */
        body.dark-mode {
            background-image: linear-gradient(to right, rgb(0, 0, 0), rgb(17, 17, 17));
            /* Alterando o gradiente para tons de preto */
            color: white;
        }

        .dark-mode .box {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
        }

        .dark-mode #data_nascimento {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: 2px solid rgba(0, 0, 0, 0.5);
            /* Removendo o roxo e substituindo por preto */
        }

        .dark-mode #submit {
            background-image: linear-gradient(to right, rgb(0, 0, 0), rgb(0, 0, 0));
            /* Alterando o gradiente para preto */
        }

        /* Estilo do botão de alternar tema */
        #theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: black;
            /* Alterando para preto */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #theme-toggle:hover {
            background-color: rgba(0, 0, 0, 0.7);
            /* Alterando para um preto mais suave */
        }
    </style>
</head>

<body>
    <a href="home.php">Voltar</a>
    <button id="theme-toggle">Alternar Tema</button>

    <div class="box">
        <form action="formulario.php" method="post">
            <fieldset>
                <legend>
                    <img src="Logo.png" alt="Logo" class="logo">
                    <b>Formulário de clientes</b>
                </legend>

                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>

                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
    <script>
        const themeToggleButton = document.getElementById('theme-toggle');
        const body = document.body;

        // Verificar o tema preferido salvo no localStorage
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'dark') {
            body.classList.add('dark-mode');
        } else {
            body.classList.add('light-mode');
        }

        // Alternar entre temas
        themeToggleButton.addEventListener('click', () => {
            body.classList.toggle('light-mode');
            body.classList.toggle('dark-mode');

            // Salvar a preferência do tema no localStorage
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    </script>

</body>

</html>