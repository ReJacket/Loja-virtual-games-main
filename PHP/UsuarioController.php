<?php
require_once '../Model/UsuarioModel.php';

$acao = $_GET['acao'] ?? '';

if ($acao == 'cadastrar') {
    $controller = new UsuarioController();
    $controller->cadastrar($_POST);
} elseif ($acao == 'login') {
    $controller = new UsuarioController();
    $controller->login($_POST['email'], $_POST['senha']);
}

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function cadastrar($dados) {
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_BCRYPT);
        $this->model->inserir($dados);
        header("Location: ../Main/Login2.0.html");
    }

    public function login($email, $senha) {
        $usuario = $this->model->buscarUsuario($email, $senha);
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: ../Main/index.html");
        } else {
            echo "Usuário ou senha inválidos.";
        }
    }
}
?>
