<?php
//informações para serem colocadas no banco
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);
$minimo = filter_input(INPUT_POST, "minimo", FILTER_SANITIZE_NUMBER_INT);
$arm = filter_input(INPUT_POST, "arm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

try {
    require_once("./conexao/conexao.php");

    $comandoSQL = $conexao->prepare("
    INSERT INTO estoque(
        nomeEstoque,
        quantidadeEstoque,
        quantidademinimaEstoque,
        armazenamento

    )VALUE(
        :nome,
        :quantidade,
        :minimo,
        :arm
    )
    ");

    $comandoSQL->execute(array(

        ":nome" => $nome,
        ":quantidade" => $quantidade,
        ":minimo" => $minimo,
        ":arm" => $arm


    ));

    if ($comandoSQL->rowCount() > 0) {
        header("location:./cadastro.php");
        exit();
    } else {
        echo "falha ao inserir (la ele)";
    }
} catch (PDOException $erro) {
        echo ("Erro Cadastrobd.");
}
