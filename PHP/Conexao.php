<?php
class Conexao {
    // Configurações do banco de dados
    private static $host = 'localhost:3306'; // Usando a porta 3306
    private static $dbName = 'LojaJogo'; // Nome do seu banco de dados
    private static $username = 'root'; // Usuário do banco de dados
    private static $password = ''; // Senha do banco de dados (vazio no caso do root no localhost)
    private static $conn = null;

    // Método para obter a conexão com o banco de dados
    public static function conectar() {
        if (self::$conn === null) {
            try {
                // Criação da conexão com o banco de dados utilizando PDO
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8", // Especificando o charset UTF-8
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura para lançar exceções em caso de erro
            } catch (PDOException $e) {
                echo "Erro na conexão: " . $e->getMessage(); // Exibe erro caso não consiga conectar
            }
        }
        return self::$conn; // Retorna a conexão
    }

    // Método para desconectar (opcional)
    public static function desconectar() {
        self::$conn = null; // Destrói a conexão
    }
}
?>
