<?php
    //echo("<pre>");
    //    print_r($_POST);
    //echo("</pre>");

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fone = filter_input(INPUT_POST, "fone", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    try {
        require_once("./conexao/conexao.php");

        $comandoSQL = $conexao->prepare("
            INSERT INTO usuarios (
                nomeUsuario,
                telefoneUsuario,
                userUsuario,
                senhaUsuario)
            VALUES(
                :nome,
                :fone,
                :usuario,
                :senha
                )
        ");

        $comandoSQL->execute(array(
            ":nome"    => $nome,
            ":fone"    => $fone,
            ":usuario" => $usuario,
            ":senha"   => password_hash($senha, PASSWORD_DEFAULT)
        ));

        if($comandoSQL->rowCount() > 0){
            echo("Usuário cadastrado");
            header("location:./cadastro.php");
            exit();

        }
        else{
            echo("Erro na inserção.");
        }
    } catch (PDOException $erro) {
        echo("Entre em contato com o suporte.");
    }