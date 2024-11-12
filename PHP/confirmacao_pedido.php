<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Pedido</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
        }

        h1 {
            color: #4CAF50;
        }

        p {
            color: #555;
            margin: 10px 0;
        }

        .detalhes-pedido {
            margin-top: 20px;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
        }

        .botao-voltar {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .botao-voltar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pedido Confirmado!</h1>
        <p>Obrigado por sua compra. Abaixo estão os detalhes do seu pedido:</p>

        <div class="detalhes-pedido">
            <?php
            // Exibe os detalhes do pedido
            if (isset($_POST['nome_jogo']) && isset($_POST['preco'])) {
                $nomeJogo = htmlspecialchars($_POST['nome_jogo']);
                $preco = htmlspecialchars($_POST['preco']);

                echo "<p><strong>Jogo:</strong> $nomeJogo</p>";
                echo "<p><strong>Preço:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";
            } else {
                echo "<p>Detalhes do pedido não encontrados.</p>";
            }
            ?>
        </div>

        <a href="pagina_inicial.php" class="botao-voltar">Voltar à Página Inicial</a>
    </div>
</body>
</html>
