<?php
require_once 'Conexao.php';

class Usuario {
    public function cadastrar($usuario, $email, $telefone, $senha) {
        $con = Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO cadastro (usuario, email, tel, senha) VALUES (?, ?, ?, ?)");
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT); // Criptografar a senha
        return $stmt->execute([$usuario, $email, $telefone, $senhaHash]);
    }
}
?>
