<?php
// Definir o fuso horário para Brasília
date_default_timezone_set('America/Sao_Paulo');

// Incluir o arquivo de conexão
include 'conexao/conexao.php';

// Receber os dados do formulário
$idEstoque = $_POST['idEstoque'] ?? null;
$quantidadeRetirada = $_POST['quantidadeRetirada'] ?? null;
$armazenamentoID = $_POST['armazenamentoID'] ?? null;
$departamentoID = $_POST['departamentoID'] ?? null;
$respRetirada = $_POST['responsavelRetirada'] ?? null;

// Validar os dados recebidos
if (empty($idEstoque) || empty($quantidadeRetirada) || empty($armazenamentoID) || empty($departamentoID) || empty($respRetirada)) {
    var_dump($idEstoque, $armazenamentoID);
    die("Erro: Todos os campos são obrigatórios.");
}

// Capturar a data e hora no fuso horário de Brasília
$dataAtual = date("Y-m-d");
$horaAtual = date("H:i:s");

try {
    // Verificar a quantidade no estoque
    $sqlEstoque = "SELECT quantidadeEstoque FROM estoque WHERE IDEstoque = :idEstoque";
    $stmtEstoque = $conexao->prepare($sqlEstoque);
    $stmtEstoque->bindParam(':idEstoque', $idEstoque, PDO::PARAM_INT);
    $stmtEstoque->execute();
    $produto = $stmtEstoque->fetch(PDO::FETCH_ASSOC);

    if ($produto && $produto['quantidadeEstoque'] >= $quantidadeRetirada) {
        // Atualizar a quantidade no estoque
        $novaQuantidade = $produto['quantidadeEstoque'] - $quantidadeRetirada;
        $sqlAtualizaEstoque = "UPDATE estoque SET quantidadeEstoque = :novaQuantidade WHERE IDEstoque = :idEstoque";
        $stmtAtualiza = $conexao->prepare($sqlAtualizaEstoque);
        $stmtAtualiza->bindParam(':novaQuantidade', $novaQuantidade, PDO::PARAM_INT);
        $stmtAtualiza->bindParam(':idEstoque', $idEstoque, PDO::PARAM_INT);
        $stmtAtualiza->execute();

        // Registrar a retirada em mov_retirada
        $sqlMovRetirada = "INSERT INTO mov_retirada (IDProdutoFK, IDDepartamentoFK,qtdRetirada, respRetirada, dataRetirada, horaRetirada) 
                           VALUES (:idEstoque, :idDepartamento,:qtdRetirada, :respRetirada, :dataAtual, :horaAtual)";
        $stmtMov = $conexao->prepare($sqlMovRetirada);
        $stmtMov->bindParam(':idEstoque', $idEstoque, PDO::PARAM_INT);
        $stmtMov->bindParam(':idDepartamento', $departamentoID, PDO::PARAM_INT);
        $stmtMov->bindParam(':qtdRetirada', $quantidadeRetirada, PDO::PARAM_INT);
        $stmtMov->bindParam(':respRetirada', $respRetirada, PDO::PARAM_STR);
        $stmtMov->bindParam(':dataAtual', $dataAtual);
        $stmtMov->bindParam(':horaAtual', $horaAtual);
        $stmtMov->execute();

        echo "Retirada registrada com sucesso!";
        header("location:./estoque.php");
        exit();
    } else {
        echo "Erro: Quantidade insuficiente no estoque.";
    }
} catch (PDOException $e) {
    echo "Erro ao processar a retirada: " . $e->getMessage();
}
?>
