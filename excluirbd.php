<?php
var_dump($_POST); // Exibe todos os dados do POST para verificar se o campo 'id' está presente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
var_dump($id); // Verifica o valor do ID

    require_once("./conexao/conexao.php");

    // Excluir o produto do banco de dados
    try {
        $sql = "DELETE FROM estoque WHERE IDEstoque=:id";
        $comandoSQL = $conexao->prepare($sql);
        $comandoSQL->execute(array(":id" => $id));
        var_dump($comandoSQL->rowCount());
    
        if ($comandoSQL->rowCount() > 0) {
            header("location:./estoque.php");
            exit();
        } else {
            echo "Nenhum item encontrado para exclusão.";
        }
    } catch (PDOException $e) {
        echo "Erro ao excluir o item: " . $e->getMessage();
    }
    
}
?>
