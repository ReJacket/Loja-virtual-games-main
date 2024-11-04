// Supondo que você tenha uma lista de jogos
// Lista de jogos
const games = [
    { nome: 'FIFA 22', descricao: 'Jogo de futebol.' },
    { nome: 'Cyberpunk 2077', descricao: 'RPG futurista.' },
    { nome: 'The Witcher 3', descricao: 'RPG de fantasia.' },
    { nome: 'Minecraft', descricao: 'Jogo de construção e sobrevivência.' },
    { nome: 'Call of Duty: Warzone', descricao: 'Battle royale e tiro em primeira pessoa.' },
    { nome: 'GTA V', descricao: 'Aventura em mundo aberto.' },
    { nome: 'Red Dead Redemption 2', descricao: 'Aventura no Velho Oeste.' },
    { nome: 'Valorant', descricao: 'Jogo de tiro tático em equipe.' },
    { nome: 'League of Legends', descricao: 'MOBA com equipes de cinco.' },
    { nome: 'Among Us', descricao: 'Jogo de dedução social.' },
    { nome: 'Fortnite', descricao: 'Battle royale com construção.' },
    { nome: 'Apex Legends', descricao: 'Battle royale com personagens únicos.' },
    { nome: 'The Elder Scrolls V: Skyrim', descricao: 'RPG de fantasia épica.' },
    { nome: 'Dark Souls III', descricao: 'RPG de ação desafiador.' },
    { nome: 'Doom Eternal', descricao: 'Jogo de tiro em primeira pessoa.' },
    { nome: 'Resident Evil Village', descricao: 'Survival horror.' },
    { nome: 'Animal Crossing: New Horizons', descricao: 'Simulador de vida.' },
    { nome: 'Hades', descricao: 'Roguelike de ação.' },
    { nome: 'Ghost of Tsushima', descricao: 'Aventura samurai no Japão.' },
    { nome: 'Assassin\'s Creed Valhalla', descricao: 'Aventura na Era Viking.' },
    { nome: 'Spider-Man: Miles Morales', descricao: 'Aventura de super-herói.' },
    { nome: 'Death Stranding', descricao: 'Aventura de entrega pós-apocalíptica.' },
    { nome: 'The Last of Us Part II', descricao: 'Aventura e survival horror.' },
    { nome: 'Final Fantasy VII Remake', descricao: 'Remake de um clássico RPG.' },
    { nome: 'CyberConnect2', descricao: 'Estúdio conhecido por jogos de anime.' },
    { nome: 'Battlefield V', descricao: 'Jogo de tiro em grande escala.' },
    { nome: 'Sekiro: Shadows Die Twice', descricao: 'RPG de ação e furtividade.' },
    { nome: 'Monster Hunter: World', descricao: 'Ação e caça de monstros.' },
    { nome: 'Hitman 3', descricao: 'Jogo de furtividade.' },
    { nome: 'Stardew Valley', descricao: 'Simulador de fazenda.' },
    { nome: 'Subnautica', descricao: 'Sobrevivência no fundo do mar.' },
    { nome: 'Ori and the Will of the Wisps', descricao: 'Aventura de plataforma.' },
    { nome: 'Hollow Knight', descricao: 'Metroidvania de ação.' },
    { nome: 'Cuphead', descricao: 'Jogo de plataforma com estilo de desenho animado.' },
    { nome: 'Dead by Daylight', descricao: 'Jogo de terror multiplayer.' },
    { nome: 'Ghostrunner', descricao: 'Jogo de ação em primeira pessoa.' },
    { nome: 'Far Cry 5', descricao: 'Aventura em mundo aberto.' },
    { nome: 'Dying Light', descricao: 'Sobrevivência em mundo aberto com zumbis.' },
    { nome: 'Monster Hunter Rise', descricao: 'Caça de monstros em um novo cenário.' },
    { nome: 'Dragon Age: Inquisition', descricao: 'RPG de fantasia.' },
    { nome: 'Persona 5 Royal', descricao: 'RPG de simulação social.' },
    { nome: 'Final Fantasy XIV', descricao: 'MMORPG de fantasia.' },
    { nome: 'Fall Guys: Ultimate Knockout', descricao: 'Battle royale de minijogos.' },
    { nome: 'World of Warcraft', descricao: 'MMORPG clássico.' },
    { nome: 'Genshin Impact', descricao: 'RPG de ação em mundo aberto.' },
    { nome: 'The Legend of Zelda: Breath of the Wild', descricao: 'Aventura em mundo aberto.' },
    { nome: 'Demon\'s Souls', descricao: 'Remake do RPG de ação clássico.' },
    { nome: 'Yakuza: Like a Dragon', descricao: 'RPG e aventura na cultura japonesa.' },
    { nome: 'Tales of Arise', descricao: 'RPG de ação com uma narrativa envolvente.' },
    { nome: 'Ghost of Tsushima: Director\'s Cut', descricao: 'Versão expandida do jogo samurai.' },
    { nome: 'Far Cry 6', descricao: 'Aventura em mundo aberto com temática política.' },
    { nome: 'NBA 2K21', descricao: 'Simulador de basquete.' },
    { nome: 'The Medium', descricao: 'Jogo de terror psicológico.' },
    { nome: 'Returnal', descricao: 'Jogo de ação roguelike.' },
    { nome: 'Microsoft Flight Simulator', descricao: 'Simulador de voo realista.' },
    { nome: 'Watch Dogs: Legion', descricao: 'Aventura em mundo aberto com hacking.' },
    { nome: 'CyberConnect2', descricao: 'Estúdio conhecido por jogos de anime.' },
    { nome: 'Fallout 76', descricao: 'MMORPG na era pós-apocalíptica.' },
    { nome: 'Skater XL', descricao: 'Simulador de skate.' },
    { nome: 'Rider', descricao: 'Jogo de corrida e acrobacias.' },
    { nome: 'Rogue Company', descricao: 'Tiro em equipe com diferentes operadores.' },
    { nome: 'Super Mario Odyssey', descricao: 'Aventura de plataforma com Mario.' },
    { nome: 'The Binding of Isaac', descricao: 'Jogo roguelike de ação.' },
    { nome: 'Rocket League', descricao: 'Futebol com carros.' },
    { nome: 'Cities: Skylines', descricao: 'Simulação de construção de cidades.' },
];

// Você pode continuar adicionando mais jogos se necessário
app.get('/set-cookie', (req, res) => {
    res.cookie('nome', 'valor', {
        maxAge: 3600000, // 1 hora
        httpOnly: true,
        secure: true,
        sameSite: 'None'
    });
    res.send('Cookie definido');
});


function searchGames() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const resultsContainer = document.getElementById('resultsContainer');
    resultsContainer.innerHTML = ''; // Limpa resultados anteriores

    // Filtra os jogos
    const filteredGames = games.filter(game => game.nome.toLowerCase().includes(input));

    // Exibe os jogos filtrados
    filteredGames.forEach(game => {
        const gameDiv = document.createElement('div');
        gameDiv.textContent = game.nome;
        resultsContainer.appendChild(gameDiv);
    });
}
