async function loadProducts() {
    const response = await fetch('fetch_products.php');
    const products = await response.json();

    const productList = document.getElementById('product-list');
    productList.innerHTML = products.map(product => `
        <div class="product">
            <img src="${product.imagem}" alt="${product.nome}">
            <h2>${product.nome}</h2>
            <p>${product.descricao}</p>
            <p>R$ ${product.preco}</p>
            <p>Plataforma: ${product.plataforma}</p>
            <button onclick="addToCart(${product.id}, '${product.nome}', ${product.preco})">Adicionar ao Carrinho</button>
        </div>
    `).join('');
}

let cart = [];

function addToCart(id, name, price) {
    const existingProduct = cart.find(item => item.id === id);
    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push({ id, name, price, quantity: 1 });
    }
    updateCartDisplay();
}

function updateCartDisplay() {
    document.getElementById('cart-count').innerText = cart.reduce((sum, item) => sum + item.quantity, 0);
}

function openPaymentModal() {
    const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    document.getElementById("total-price").innerText = `R$ ${totalPrice}`;
    document.getElementById("total-hidden").value = totalPrice;
    document.getElementById("payment-modal").style.display = "block";
}

loadProducts();
