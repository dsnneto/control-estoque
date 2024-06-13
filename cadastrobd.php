<?php
//informações para serem colocadas no banco
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);
$minimo = filter_input(INPUT_POST, "minimo", FILTER_SANITIZE_NUMBER_INT);

try {
    require_once("./conexao/conexao.php");

    $comandoSQL = $conexao->prepare("
    INSERT INTO estoque(
        nomeEstoque,
        quantidadeEstoque,
        quantidademinimaEstoque
    )VALUE(
        :nome,
        :quantidade,
        :minimo

    )
    ");

    $comandoSQL->execute(array(

        ":nome" => $nome,
        ":quantidade" => $quantidade,
        ":minimo" => $minimo


    ));

    if ($comandoSQL->rowCount() > 0) {
        echo "inserido com sucesso";
        header("location:./cadastro.php");
        exit();
    } else {
        echo "falha ao inserir (la ele)";
    }
} catch (PDOException $erro) {
        echo ("Erro Cadastrobd.");
}
