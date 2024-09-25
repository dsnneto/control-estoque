<?php
// excluirbd.php

require_once './estoquebd.php'; // Inclua a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Valide e sanitize o ID
    $id = intval($id);

    // Prepare a declaração SQL para excluir o item
    $sql = "DELETE FROM estoque WHERE IDEstoque = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao excluir o item.']);
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405); // Método não permitido
}
?>
