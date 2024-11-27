<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

        require_once("./conexao/conexao.php");

        // Excluir o produto do banco de dados
        $sql = "DELETE FROM estoque WHERE IDEstoque=:id";
        $comandoSQL = $conexao->prepare($sql);
        $comandoSQL->execute(array(":id" => $id));

        // Verificar se a exclusão foi bem-sucedida
        if($comandoSQL->rowCount() > 0){
            // Sucesso na exclusão, redirecionar de volta para a página de estoque
            header("location:./estoque.php");
            exit();
        } else {
            // Caso não haja alteração, exibe uma mensagem de erro
            echo "Erro ao excluir o item. Entre em contato com o suporte!";
        }
    }