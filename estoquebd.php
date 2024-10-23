<?php
require_once ("./conexao/conexao.php");

try {
    // Inicializa a variável $dados
    $dados = [];
    $totalRegistros = 0;

    // Verifica se há uma busca
    if (isset($_GET['busca']) && !empty($_GET['busca'])) {
        $busca = $_GET['busca'];
        // Consulta ajustada para busca exata em armazenamento e LIKE nas outras colunas
        $comandoSQL = "SELECT * FROM estoque WHERE nomeEstoque LIKE :busca OR departamento LIKE :busca OR armazenamento = :armazenamento";
        $stmt = $conexao->prepare($comandoSQL);
        $stmt->execute(['busca' => '%' . $busca . '%', 'armazenamento' => $busca]);
    } else {
        $comandoSQL = "SELECT * FROM estoque";
        $stmt = $conexao->query($comandoSQL);
    }

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalRegistros = $stmt->rowCount();
} catch (PDOException $erro) {
    echo ("Erro estoqueBD: " . $erro->getMessage());
}

// COMANDOS PARA VERIFICAR TOTAL DE PRODUTOS, PRODUTOS PARA RESTOQUE E PRODUTOS QUE ACABARAM
try {
    $sql_total = "SELECT COUNT(*) AS total_produtos FROM estoque";
    $stmt_total = $conexao->prepare($sql_total);
    $stmt_total->execute();
    $row_total = $stmt_total->fetch(PDO::FETCH_ASSOC);
    $total_produtos = $row_total['total_produtos'];

    // Contar produtos perto de acabar
    $sql_perto = "SELECT COUNT(*) AS produtos_perto_de_acabar FROM estoque WHERE quantidadeEstoque <= quantidademinimaEstoque";
    $stmt_perto = $conexao->prepare($sql_perto);
    $stmt_perto->execute();
    $row_perto = $stmt_perto->fetch(PDO::FETCH_ASSOC);
    $produtos_perto_de_acabar = $row_perto['produtos_perto_de_acabar'];

    // Contar produtos acabados
    $sql_acabados = "SELECT COUNT(*) AS produtos_acabados FROM estoque WHERE quantidadeEstoque = 0";
    $stmt_acabados = $conexao->prepare($sql_acabados);
    $stmt_acabados->execute();
    $row_acabados = $stmt_acabados->fetch(PDO::FETCH_ASSOC);
    $produtos_acabados = $row_acabados['produtos_acabados'];

} catch (PDOException $erro) {
    echo "Deu errado: " . $erro->getMessage();
}
