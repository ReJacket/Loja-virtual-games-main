<?php
include 'Conexao.php'; // Certifique-se de que a conexão está correta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_confirmar = $_POST['senha_confirmar'];

    if ($senha !== $senha_confirmar) {
        echo "<script>alert('As senhas não coincidem');</script>";
        echo "<script>window.history.back();</script>";
    } else {
        $conexao = Conexao::getConexao();

        $stmt = $conexao->prepare("INSERT INTO usuarios (nome, usuario, email, senha, senha_confirmar) 
                                   VALUES (:nome, :usuario, :email, :senha, :senha_confirmar)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':senha_confirmar', $senha_confirmar);

        if ($stmt->execute()) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            echo "<script>window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar.');</script>";
        }
    }
}
?>
