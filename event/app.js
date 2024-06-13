let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnails = document.querySelectorAll('.thumbnail .item');
let thumbnailContainer = document.querySelector('.thumbnail');

// config parametro
let countItem = items.length;
let itemActive = 0;

// event proximo clique
next.onclick = function() {
    itemActive = itemActive + 1;
    if (itemActive >= countItem) {
        itemActive = 0;
    }
    showSlider();
}

// event prev click
prev.onclick = function() {
    itemActive = itemActive - 1;
    if (itemActive < 0) {
        itemActive = countItem - 1;
    }
    showSlider();
}

// auto run slider
let refreshInterval = setInterval(() => {
    next.click();
}, 5000)

function showSlider() {
    // Faz com que passe para o proximo item e retire o antigo do lugar
    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld.classList.remove('active');
    thumbnailActiveOld.classList.remove('active');

    // ativação do novo item
    items[itemActive].classList.add('active');
    thumbnails[itemActive].classList.add('active');

    // Slide automatico com o tempo
    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 10000)
}

// Click na imagem dos jogos
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        itemActive = index;
        showSlider();
    })
})

// scroll horizontal com a roda do mouse
thumbnailContainer.addEventListener('wheel', (event) => {
    if (event.deltaY !== 0) {
        event.preventDefault();
        thumbnailContainer.scrollLeft += event.deltaY;
    }
    
});
// app.js



