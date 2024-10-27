<?php
class Conexao {
    public static function conectar() {
        $host = 'localhost:3008';
        $dbname = 'Banco_Cosmic';
        $usuario = 'root';
        $senha = '';  

        try {
            return new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
?>
