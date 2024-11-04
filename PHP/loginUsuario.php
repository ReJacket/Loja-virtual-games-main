<?php 

include'../configuracao/Conexao.php';
header('Content-Type: application/json');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = $conn->prepare('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');
$sql->bindvalue(':email', $email);
$sql->bindvalue(':senha', $senha);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
        $email = $dado['email'];
        $senha = $dado['senha'];
        $json[] = array('email'=> $email,'senha'=> md5($senha));
    }
    echo json_encode($json, JSON_PRETTY_PRINT);
}else{
    echo '[{"status": "error"}]';
}