
<?php
require_once '../models/Usuario.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function cadastrar($dados) {
        // Verifique se todos os dados necessários foram recebidos
        if (!empty($dados['usuario']) && !empty($dados['email']) && !empty($dados['telefone']) && !empty($dados['senha'])) {
            // Enviar para o modelo
            return $this->usuarioModel->cadastrar($dados['usuario'], $dados['email'], $dados['telefone'], $dados['senha']);
        }
        return false;
    }
}

// Processar requisições
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuarioController();

    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        $controller->cadastrar($_POST);
    }
}
?>
