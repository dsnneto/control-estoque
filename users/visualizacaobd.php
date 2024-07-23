<?php
    require_once("./conexao/conexao.php");
    try {
        // SQL que queremos executar no banco
        $comandoSQL = "SELECT * FROM usuarios";

        // Executa o comandoSQL no banco QUERY
        $dadosSelecionados=$conexao->query($comandoSQL);

        // Coloca os dados em formato de matriz / Excel
        $dados = $dadosSelecionados->fetchAll();

        // Pega o total de registro selecionados
        $totalRegistros = $dadosSelecionados->rowCount();

    } catch (PDOException $erro) {
        echo ("Entre em contato com administrador");
    }
