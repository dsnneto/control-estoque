<?php
require_once('./conexao/conexao.php');

try {
    // Consultar todos os dados da tabela estoque
    $comandoSQL = "SELECT * FROM estoque";
    $dadosSelecionados = $conexao->query($comandoSQL);

    // Fetch todos os dados e contar registros
    $dados = $dadosSelecionados->fetchAll(PDO::FETCH_ASSOC);
    $totalRegistros = $dadosSelecionados->rowCount();

} catch (PDOException $erro) {
    echo "Erro ao consultar estoque: " . $erro->getMessage();
}

// COMANDOS PARA VERIFICAR TOTAL DE PRODUTOS, PRODUTOS PARA RESTOQUE E PRODUTOS QUE ACABARAM
try {
    // Contar total de produtos
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

    // Exibir resultados (opcional)
    // echo "<p>Total de produtos no estoque: " . $total_produtos . "</p><br>";
    // echo "<p>Produtos perto de acabar: " . $produtos_perto_de_acabar . "</p><br>";
    // echo "<p>Produtos acabados: " . $produtos_acabados . "</p><br>";

} catch (PDOException $erro) {
    echo "Erro ao consultar estatísticas de estoque: " . $erro->getMessage();
}
?>
