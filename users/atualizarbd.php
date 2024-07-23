<?php

    //echo ("<pre>");
    //print_r($_POST);
    //echo ("</pre>");

    $id      = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $nome    = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fone    = filter_input(INPUT_POST, "fone", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $senha   = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    try {
        require_once("./conexao/conexao.php");

        if($senha == "***"){
            $comandoSQL = $conexao->prepare("
                            UPDATE usuarios SET
                                nomeUsuario = :nome,
                                telefoneUsuario = :fone,
                                userUsuario = :usuario 
                            WHERE idUsuario = :id
                            ");

            $comandoSQL->execute(array(
                ":nome"     => $nome,
                ":fone"     => $fone,
                ":usuario"  => $usuario,
                ":id"       => $id
            ));
        }
        else{
            $comandoSQL = $conexao->prepare("
                            UPDATE usuarios SET
                                nomeUsuario = :nome,
                                telefoneUsuario = :fone,
                                userUsuario = :usuario,
                                senhaUsuario = :senha 
                            WHERE idUsuario = :id
                            ");

            $comandoSQL->execute(array(
                ":nome"     => $nome,
                ":fone"     => $fone,
                ":usuario"  => $usuario,
                ":senha"    => $senha,
                ":id"       => $id
            ));
        }

        if($comandoSQL->rowCount() > 0){
            //echo("Atualização feita com sucesso!");
            header("location:./visualizacao.php");
            exit();
        }
        else{
            echo("ERRO na atualização!");
        }

    } catch (PDOException $erro) {
         echo ("Entre em contado como o suporte!");
    }
