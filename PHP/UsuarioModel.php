<?php
require_once 'Conexao.php';

class UsuarioModel {
    // Método para buscar todos os usuários
    public static function getUsuarios() {
        $conn = Conexao::conectar();
        $stmt = $conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para inserir um novo usuário
    public static function inserirUsuario($nome, $email, $senha) {
        $conn = Conexao::conectar();
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    // Outros métodos para atualizar e excluir usuários...
}
?>
