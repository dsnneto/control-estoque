<?php
$id  = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
$nItem = filter_input(INPUT_POST, "nItem", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);
$minimo = filter_input(INPUT_POST, "minimo", FILTER_SANITIZE_NUMBER_INT);


try {
    require_once("./conexao/conexao.php");
    $comandoSQL = $conexao->prepare("

    UPDATE estoque SET

    nomeEstoque = :nItem,
    quantidadeEstoque = :quantidade,
    quantidademinimaEstoque = :minimo
    WHERE IDEstoque = :id


");

    $comandoSQL->execute(array(

        ":nItem" => $nItem,
        ":quantidade" => $quantidade,
        ":minimo" => $minimo,
        ":id" => $id


    ));

    if ($comandoSQL->rowCount() > 0) {
        header("location:./estoque.php");
        exit();
    } else {
        echo ("Erro na atualização");
    }
} catch (PDOException $erro) {

    echo "<pre>";
    echo $comandoSQL->debugDumpParams();
    echo "</pre>";
    echo (" Erro editar bd ");
}
