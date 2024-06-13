<?php
require_once ("./conexao/conexao.php");

try {
    $comandoSQL = "SELECT * FROM estoque LIMIT 20";

    $dadosSelecionados = $conexao->query($comandoSQL);

    $dados = $dadosSelecionados->fetchAll();

    $totalRegistros = $dadosSelecionados->rowCount();
} catch (PDOException $erro) {
    echo ("Erro estoqueBD");
}
