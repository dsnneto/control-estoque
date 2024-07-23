<?php
    require_once("./conexao/conexao.php");

    try {
        $sql = "SELECT * FROM usuarios WHERE idUsuario=:id";
        $comandoSQL = $conexao->prepare($sql);
        $comandoSQL->execute(array(":id" => $id));
        $resultado = $comandoSQL->fetch();

    } catch (PDOException $erro) {
        echo("Entre em contato com o suporte!");
    }