<?php
// Configurações do banco de dados
$host = 'localhost:3306';
$dbname = 'LojaJogo'; // Nome do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_confirmar = $_POST['senha_confirmar'];

        // Verifica se as senhas coincidem
        if ($senha === $senha_confirmar) {
            // Criptografa a senha antes de armazená-la no banco de dados
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

            // Prepara a consulta SQL para inserir os dados do usuário
            $sql = "INSERT INTO usuarios (nome, usuario, email, senha) VALUES (:nome, :usuario, :email, :senha)";
            $stmt = $conn->prepare($sql);

            // Vincula os parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senhaHash);

            // Executa a consulta
            if ($stmt->execute()) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        } else {
            echo "As senhas não coincidem. Tente novamente.";
        }
    }
} catch (PDOException $e) {
    // Exibe erro na conexão com o banco de dados
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
