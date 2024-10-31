const appIds = {
  csgo: 730,
  gta: 271590,
  witchfire: 394510,
};

function fetchPrices() {
  const url = `https://store.steampowered.com/api/appdetails?appids=${Object.values(
    appIds
  ).join(",")}&cc=BR&l=portuguese`;

  // Exibir mensagem de carregamento
  const loadingElement = document.getElementById("loading");
  loadingElement.style.display = "block";

  fetch('url_da_api_de_precos')
    .then(response => response.json())
    .then(data => {
        const pricesDiv = document.querySelector('.price-links');
        pricesDiv.innerHTML = `
            <a href="${data.steam_link}" class="price">Steam: R$ ${data.steam_price}</a>
            <a href="${data.gog_link}" class="price">GOG: R$ ${data.gog_price}</a>
            <a href="${data.epic_link}" class="price">Epic: R$ ${data.epic_price}</a>
        `;
    })
    .catch(error => console.error('Erro ao buscar os preços:', error));

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      for (const [key, id] of Object.entries(appIds)) {
        const gameData = data[id];
        const priceElement = document.getElementById(`price-${key}`);
        if (gameData && gameData.success) {
          const price = gameData.data.price_overview
            ? gameData.data.price_overview.final / 100
            : 0;
          priceElement.innerHTML = `R$ ${price.toFixed(
            2
          )} <a href="https://store.steampowered.com/app/${id}/" target="_blank" class="price-button">Comprar</a>`;
        } else {
          priceElement.innerHTML = "Preço não disponível.";
        }
      }
    })
    .catch((error) => {
      console.error("Erro ao buscar preços:", error);
      // Exibir mensagem de erro
      const errorElement = document.getElementById("error");
      errorElement.style.display = "block";
      errorElement.innerText =
        "Erro ao buscar preços. Tente novamente mais tarde.";
    })
    .finally(() => {
      // Esconder mensagem de carregamento
      loadingElement.style.display = "none";
    });
}

// Chama a função ao carregar a página
window.onload = fetchPrices;



