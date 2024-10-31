<?php
class Conexao {
    private static $instance;
    
    public static function getConexao() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=localhost;port=3308;dbname=LojaVirtual", "root", "");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
?>
