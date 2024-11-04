<?php
// Conectar ao banco de dados
$pdo = new PDO("mysql:host=localhost;dbname=Banco_Cosmic", "root", "");

header("Content-Type: application/json");

// Captura o termo de pesquisa
$data = json_decode(file_get_contents("php://input"), true);
$term = "%" . $data["term"] . "%";

// Consulta no banco de dados
$stmt = $pdo->prepare("SELECT * FROM jogos WHERE nome LIKE :term OR descricao LIKE :term");
$stmt->bindParam(":term", $term);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retorna os resultados como JSON
echo json_encode($results);
setcookie('nome', 'valor', [
    'expires' => time() + 3600,
    'path' => '/',
    'domain' => 'seusite.com',
    'secure' => true,   // somente se o site estiver em HTTPS
    'httponly' => true,
    'samesite' => 'None' // ou 'Lax', dependendo do seu caso
]);

?>
