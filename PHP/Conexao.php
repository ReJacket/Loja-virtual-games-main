<?php
class Conexao {
    private static $instance;
    
    public static function getConexao() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=localhost;port=3304;dbname=Banco_Cosmic", "root", "");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
setcookie('nome', 'valor', [
    'expires' => time() + 3600,
    'path' => '/',
    'domain' => 'seusite.com',
    'secure' => true,   // somente se o site estiver em HTTPS
    'httponly' => true,
    'samesite' => 'None' // ou 'Lax', dependendo do seu caso
]);

?>
