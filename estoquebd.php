<?php
require_once ("./conexao/conexao.php");

try {
    $comandoSQL = "SELECT * FROM estoque";

    $dadosSelecionados = $conexao->query($comandoSQL);

    $dados = $dadosSelecionados->fetchAll();

    $totalRegistros = $dadosSelecionados->rowCount();
} catch (PDOException $erro) {
    echo ("Erro estoqueBD");
}
