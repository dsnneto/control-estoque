<?php
require_once('./conexao/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        // Decrementar a quantidade em 1
        $sql = "UPDATE estoque SET quantidadeEstoque = quantidadeEstoque - 1 WHERE IDEstoque = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Verificar se a atualização foi bem-sucedida
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar a quantidade.']);
        }
    } catch (PDOException $erro) {
        echo json_encode(['status' => 'error', 'message' => $erro->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido.']);
}
?>
