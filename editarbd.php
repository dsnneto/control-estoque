<?php
$id  = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
$nItem = filter_input(INPUT_POST, "nItem", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);
$minimo = filter_input(INPUT_POST, "minimo", FILTER_SANITIZE_NUMBER_INT);

try {
    require_once("./conexao/conexao.php");
    
    $conexao->beginTransaction();

    $sql = "SELECT quantidadeEstoque, nomeEstoque FROM estoque
    WHERE IDEstoque = :id
    ";
    $comandoSQL = $conexao->prepare($sql);
    $comandoSQL->execute(array(":id" => $id));
    $resultado = $comandoSQL->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {

        $QtdAntiga = $resultado['quantidadeEstoque'];
        $nomeEstoque = $resultado['nomeEstoque'];


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
            // Insere um registro na tabela de log

            $alterado = $quantidade - $QtdAntiga;

            $comandoSQL = $conexao->prepare("
         INSERT INTO movimentacao (IDEFK,AlteradoM, QtdM, NomeEM)
         VALUES (:id, :alterado, :Qtd , :nomeEstoque)
     ");
            $comandoSQL->execute(array(
                ":id" => $id,
                ":alterado" => $alterado,
                ":Qtd" => $quantidade,
                ":nomeEstoque" => $nomeEstoque

            ));

            // Se tudo ocorreu bem, confirma a transação
            $conexao->commit();
            header("Location: ./estoque.php");
            exit();
        } else {
            echo ("Erro na atualização");
        }
    }
} catch (PDOException $erro) {

    echo "<pre>";
    echo $comandoSQL->debugDumpParams();
    echo "</pre>";
    echo (" Erro editar bd ");
}
