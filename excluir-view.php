<?php
require_once ("./conexao/conexao.php");

try {   

        $sql = "SELECT * FROM estoque WHERE IDEstoque=:id";
        $comandoSQL = $conexao->prepare($sql);
        $comandoSQL->execute(array(":id"=>$id));
        $resultado = $comandoSQL->fetch();
    
        //echo $comandoSQL->debugDumpParams();

} catch (\Throwable $th) {
    echo ("Erro no id");
}