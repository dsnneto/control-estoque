<?php
    $dns = "mysql:host=localhost;dbname=bdestoque;charset=utf8";
    $user= "root";
    $pass= "";

    try {

        $conexao = new PDO($dns, $user, $pass);
        //echo "Conectado com sucesso!";

        // Definir o modo de erro para exceções
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $erro) {
        //echo $erro->getMessage();
        echo "<h1 style='color: red;'>ERRO NA CONEXÂO INICIAL</h1>";
    }
