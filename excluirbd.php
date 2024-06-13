<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

        require_once("./conexao/conexao.php");

        $sql = "DELETE FROM estoque WHERE IDEstoque=:id";
        $comandoSQL = $conexao->prepare($sql);
        $comandoSQL->execute(array(":id" => $id));

        if($comandoSQL->rowCount() > 0){
            ("Registro excluído com sucesso!");
            header("location:./estoque.php");
            exit();
        }
        else{
            echo("Entre em contato com o suporte!");
        }
    }