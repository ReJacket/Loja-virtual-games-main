<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function cadastrarUsuario($nome, $senha) {
        try {
            $stmt = $this->db->prepare("INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', password_hash($senha, PASSWORD_BCRYPT));
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar usuário: " . $e->getMessage();
            return false;
        }
    }
    public function obterUsuarios() {
        try {
            $stmt = $this->db->query("SELECT id, nome AS email FROM usuarios");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao obter usuários: " . $e->getMessage();
            return [];
        }
    }
    

    public function verificarCredenciais($nome, $senha) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE nome = :nome");
            $stmt->bindParam(':nome', $nome);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($usuario && password_verify($senha, $usuario['senha'])) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo "Erro ao verificar credenciais: " . $e->getMessage();
            return false;
        }
    }
}
?>
