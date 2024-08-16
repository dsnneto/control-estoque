<?php

    // Verifica se a requisição HTTP é do tipo POST
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        // Filtra e sanitiza os dados de entrada do usuário para evitar vulnerabilidades
        $usuario = filter_input(
            INPUT_POST,
            "user",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $senha = filter_input(INPUT_POST,
            "senha",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Inclui o arquivo de conexão com o banco de dados
        require_once("../conexao/conexao.php");
        
        try {
            
            // Prepara e executa uma consulta SQL para selecionar um usuário com base no nome de usuário fornecido
            $sql = "SELECT * FROM usuarios WHERE userUsuario=:user";
            $comandoSQL = $conexao->prepare($sql);
            $comandoSQL->execute(array(':user' => $usuario));

            // Verifica se o usuário foi encontrado no banco de dados
            if($comandoSQL->rowCount() > 0){
                $linha = $comandoSQL->fetch();

                // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
                if(password_verify($senha, $linha["senhaUsuario"])){
                    // Inicia uma sessão e armazena o nome do usuário na sessão
                    session_start();
                    $_SESSION["nome"] = $linha["nomeUsuario"];

                    // Redireciona o usuário para a página de visualização
                    header("location:../home.php");
                    exit();
                }
                else{
                    echo("Usuário não cadastrado.");
                    // Exibe uma mensagem de erro se a senha estiver incorreta
                    echo("Senha inválida.");
                }
            }
            else{
                // Exibe uma mensagem de erro se o usuário não estiver cadastrado no sistema
                echo("Usuário não cadastrado.");
            }
        } catch (PDOException $erro) {
            // Exibe uma mensagem de erro genérica em caso de falha na execução da consulta SQL
            echo ("Entre em contato com o suporte!");
        }
    }
    else {
        // Exibe uma mensagem de erro se a requisição HTTP não for do tipo POST
        echo ("Entre em contato com o suporte!");
    }
?>