<?php

include'../configuracao/Conexao.php';
header('Content-Type: application/json');

$email = $_POST['user'];
$usuario = $_POST['usuario'];
$senha = $_POST['password'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];

$sql = $conn->prepare('INSERT INTO usuarios (nome, usuario, email, senha, telefone) VALUE (:nome, :usuario, :email, :senha, :telefone)');
$sql->bindvalue(':email', $email);
$sql->bindValue(':senha', $senha);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':usuario', $usuario);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
        $email = $dado['email'];
        $senha = $dado['senha'];
        $nome = $dado['nome'];
        $usuario = $dado['usuario'];
        $telefone = $dado['telefone'];
        $json[]= array('email'=> $email, 'senha'=> $senha, 'nome'=> $nome, 'telefone'=> $telefone, 'usuario'=> $usuario);
    }echo json_encode($json, JSON_PRETTY_PRINT);
}else{
    echo '[{"status": "error"}]';
}
