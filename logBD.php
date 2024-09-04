<?php
require_once ("./conexao/conexao.php");
//pegando as informações da tabela de movimentação
//parametros: IDM , DataM , HoraM, QtdM , IDEFK  
try {
    $comandoSQL = "SELECT * FROM movimentacao";

    $dadosSelecionados = $conexao->query($comandoSQL);

    $dados = $dadosSelecionados->fetchAll();

    $totalRegistros = $dadosSelecionados->rowCount();
} catch (PDOException $erro) {
    echo ("Erro estoqueBD");
}
