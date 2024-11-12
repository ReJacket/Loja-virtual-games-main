<?php
session_start();

// Definindo o array de itens antes de qualquer verificação
$items = array(
    ['nome' => 'Spider-Man', 'imagem' => './aranha.jpeg', 'preco' => 200],
    ['nome' => 'CS:2', 'imagem' => './CS.jpeg', 'preco' => 250],
    ['nome' => 'Red Dead Redemption', 'imagem' => './dead.jpeg', 'preco' => 270],
    ['nome' => 'Sea of stars', 'imagem' => './sea.jpeg', 'preco' => 70],
    ['nome' => 'Amnesia the Bunker', 'imagem' => './The bunker.jfif', 'preco' => 270],
    ['nome' => 'F1', 'imagem' => './F12024.jpg', 'preco' => 320],
    ['nome' => 'The Crew 2', 'imagem' => './thecrew2.jpg', 'preco' => 170],
    ['nome' => 'Alan Wake 2', 'imagem' => './Alan wake 2.avif', 'preco' => 220],
    ['nome' => 'Apex Legends', 'imagem' => './apx.jpg', 'preco' => 00],
    ['nome' => 'Watch Dogs 2', 'imagem' => './Dog.jpg', 'preco' => 205],
    ['nome' => 'FC 24', 'imagem' => './EA.avif', 'preco' => 140],
    ['nome' => 'Efootball', 'imagem' => './efootball-2024.jpg', 'preco' => 00],
    ['nome' => 'Destiny 2', 'imagem' => './Dst.jpg', 'preco' => 00],
    ['nome' => 'Formula1', 'imagem' => './F12024.jpg', 'preco' => 300],
    ['nome' => 'Genshin Impact', 'imagem' => './Genshin Impact.webp', 'preco' => 00],
    ['nome' => 'Mario Party', 'imagem' => './mario party.webp', 'preco' => 320],
    ['nome' => 'The Evil Within 2', 'imagem' => './evill 2.webp', 'preco' => 115],
    ['nome' => 'Forza Horizon 5', 'imagem' => './ForzaHorizon5.jpg', 'preco' => 343],
    ['nome' => 'Signalis', 'imagem' => './SIGNALIS.jfif', 'preco' => 80],
    ['nome' => 'Dark souls', 'imagem' => './soul.png', 'preco' => 110],
    ['nome' => 'The last of us 2', 'imagem' => './Tlou2.jpg', 'preco' => 255],
    ['nome' => 'God of war: Ragnarok', 'imagem' => './Ragnarok.jpg', 'preco' => 245],
    ['nome' => 'Horizon Zero dawn', 'imagem' => './paisagem2.avif', 'preco' => 145],
    ['nome' => 'Gun', 'imagem' => './Gun.png', 'preco' => 130],
    ['nome' => 'Tony Hawk pro Sakter 1&2', 'imagem' => './tony hawks.jpg', 'preco' => 200],
    ['nome' => 'Until Dawn', 'imagem' => './UNTIL DAWN.jpg', 'preco' => 240],
    ['nome' => 'GTAV', 'imagem' => './v.jpg', 'preco' => 150],
    ['nome' => 'Resident Evil Village', 'imagem' => './VILAGGE.png', 'preco' => 190],
    ['nome' => 'UFC-2', 'imagem' => './UF2.jpg', 'preco' => 210],
    ['nome' => 'NA2K', 'imagem' => './nba.jpg', 'preco' => 350],
    ['nome' => 'Madden NFL 24', 'imagem' => './Madden NFL 24.avif', 'preco' => 220],
    ['nome' => 'Rachet and Clank', 'imagem' => './Clank.jpg', 'preco' => 50],
    ['nome' => 'Call of Duty: MW4', 'imagem' => './cdw.webp', 'preco' => 300],
    ['nome' => 'Street fighter', 'imagem' => './akuma.jpg', 'preco' => 260],
    ['nome' => 'Golf With Friends', 'imagem' => './golf.avif', 'preco' => 50],
    ['nome' => 'PGA Tour 2k23', 'imagem' => './PGA Tour.avif', 'preco' => 120],
    ['nome' => 'Outlast', 'imagem' => './OUTLAST.jpg', 'preco' => 100],
    
);

// Inicializando o carrinho se ele ainda não existir na sessão
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Função para adicionar item ao carrinho
if (isset($_GET['adicionar'])) {
    $idProduto = (int)$_GET['adicionar'];
    if (isset($items[$idProduto])) {
        if (isset($_SESSION['carrinho'][$idProduto])) {
            $_SESSION['carrinho'][$idProduto]['quantidade']++;
        } else {
            $_SESSION['carrinho'][$idProduto] = array(
                'quantidade' => 1,
                'nome' => $items[$idProduto]['nome'],
                'preco' => $items[$idProduto]['preco']
            );
        }
    }
}

// Função para aumentar quantidade diretamente no carrinho
if (isset($_GET['aumentar'])) {
    $idProduto = (int)$_GET['aumentar'];
    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]['quantidade']++;
    }
}

// Função para remover item do carrinho
if (isset($_GET['remover'])) {
    $idProduto = (int)$_GET['remover'];
    if (isset($_SESSION['carrinho'][$idProduto])) {
        if ($_SESSION['carrinho'][$idProduto]['quantidade'] > 1) {
            $_SESSION['carrinho'][$idProduto]['quantidade']--;
        } else {
            unset($_SESSION['carrinho'][$idProduto]);
        }
    }
}

// Calcular o valor total do carrinho
$total = 0;
foreach ($_SESSION['carrinho'] as $item) {
    $total += $item['preco'] * $item['quantidade'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho De Compras Cosmic</title>
    <style>
        /* CSS geral */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Botão de Voltar */
        .back-button {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #067;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #045;
        }

        h2.title {
            background-color: #067;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Caixa estilizada para os itens do carrinho */
        .carrinho-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .produto, .carrinho-item {
            width: 250px;
            background-color: #f1f1f1;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s;
            overflow: hidden;
        }

        .produto:hover, .carrinho-item:hover {
            transform: scale(1.03);
        }

        .produto img {
            width: 100%;
            height: auto;
            max-height: 150px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .produto a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            color: #fff;
            background-color: #067;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .produto a:hover {
            background-color: #045;
        }

        .carrinho-item p {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        /* Botões no carrinho */
        .increase-quantity,
        .remove-item {
            display: inline-block;
            margin: 5px;
            padding: 8px 12px;
            color: #fff;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .increase-quantity {
            background-color: #067;
        }

        .increase-quantity:hover {
            background-color: #045;
        }

        .remove-item {
            background-color: #e74c3c;
        }

        .remove-item:hover {
            background-color: #c0392b;
        }

        /* Caixa de Total do Carrinho */
        .total {
            background-color: #067;
            color: #fff;
            padding: 20px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            border-radius: 10px;
            width: 300px;
            margin: 20px auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: scale(0.9);
            animation: fadeInUp 0.5s ease forwards;
        }

        /* Animação de fade e movimento para o total */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Caixa de confirmação centralizada */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .overlay.show {
            display: block;
        }

        .confirm-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #28a745;
            color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            font-size: 24px;
            text-align: center;
            z-index: 1000;
        }

        .confirm-box.show {
            display: block;
        }
    </style>
    <script>
        function showLoading(id) {
            // Seleciona a caixa de confirmação e a sobreposição
            const confirmBox = document.getElementById('confirm-box');
            const overlay = document.getElementById('overlay');

            // Mostra a caixa de confirmação e a sobreposição
            confirmBox.classList.add('show');
            overlay.classList.add('show');

            // Remove a classe após 2 segundos
            setTimeout(() => {
                confirmBox.classList.remove('show');
                overlay.classList.remove('show');
            }, 2000);
        }
    </script>
</head>

<body>
    <!-- Botão de Voltar -->
    <button class="back-button" onclick="window.location.href='../pages/index.html'">Voltar</button>

    <h2 class="title">Carrinho Cosmic</h2>

    <div class="carrinho-container">
        <?php
        foreach ($items as $key => $value) {
        ?>
            <div class="produto" id="product-<?php echo $key; ?>">
                <img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['nome']; ?>">
                <h3><?php echo $value['nome']; ?></h3>
                <p>Preço: R$<?php echo $value['preco']; ?>,00</p>
                <a href="?adicionar=<?php echo $key; ?>" onclick="event.preventDefault(); showLoading(<?php echo $key; ?>); location.href='?adicionar=<?php echo $key; ?>';">Adicionar ao carrinho</a>
            </div>
        <?php
        }
        ?>
    </div>

    <h2 class="title">Carrinho</h2>

    <div class="carrinho-container">
        <?php
        // Verificar se o carrinho possui itens
        if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
            foreach ($_SESSION['carrinho'] as $key => $value) {
                echo '<div class="carrinho-item">';
                echo '<p>Nome: ' . $value['nome'] . ' | Quantidade: ' . $value['quantidade'] . ' | Preço: R$' . ($value['quantidade'] * $value['preco']) . ',00</p>';
                echo '<a href="?aumentar=' . $key . '" class="increase-quantity">&#9650;</a>'; // Seta para aumentar quantidade
                echo '<a href="?remover=' . $key . '" class="remove-item">Remover</a>'; // Link para remover item
                echo '</div>';
            }
        ?>

            <!-- Exibindo o total do carrinho -->
            <div class="total">
                Total do Carrinho: R$<?php echo $total; ?>,00
            </div>

        <?php
        } else {
            echo '<p class="empty-cart-message">Seu carrinho está vazio.</p>';
        }
        ?>
    </div>

    <div id="overlay" class="overlay"></div>
    <div id="confirm-box" class="confirm-box">
        &#10003; Item adicionado ao carrinho!
    </div>

</body>

</html>
