<?php

    $dbHost = 'Localhost:3306';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'formulario-renan';
    
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // if($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>