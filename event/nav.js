const listaOptions = document.getElementById('list-nav-op')
const containerOptions = document.getElementById('open-list-options')

function openListOptions() {
    containerOptions.innerHTML = "<div><li>Comunidades</li><li>Gift Cards</li><li>Loja virtual</li></div>"
}

listaOptions.addEventListener('click', openListOptions)