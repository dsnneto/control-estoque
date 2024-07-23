<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

        require_once("./conexao/conexao.php");

        $sql = "DELETE FROM usuarios WHERE idUsuario=:id";

        $comandoSQL = $conexao->prepare($sql);
        
        $comandoSQL->execute(array(
            ":id" => $id
        ));

        if($comandoSQL->rowCount() > 0 ){
            header("location:./visualizacao.php");
            exit();
        }else{
            echo("deu não");
        }
    }