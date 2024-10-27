<?php
require_once '../Conexao.php';

class UsuarioModel {
    public function inserir($dados) {
        $conexao = Conexao::conectar();
        $sql = "INSERT INTO usuarios (nome, usuario, email, telefone, senha) 
                VALUES (:nome, :usuario, :email, :telefone, :senha)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute($dados);
    }

    public function buscarUsuario($email, $senha) {
        $conexao = Conexao::conectar();
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conexao->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
}
?>
