<?php
    $dns = "mysql:host=localhost;dbname=bdestoque;charset=utf8";
    $user= "root";
    $pass= "";

    try {

        $conexao = new PDO($dns, $user, $pass);
        //echo "Conectado com sucesso!";

    } catch (PDOException $erro) {
        //echo $erro->getMessage();
        echo "Entre em contato com o desenvolvedor";
    }