<?php
require_once("./conexao/conexao.php");

$totalRegistros = 0; // Inicializa a variável antes do bloco try-catch

try {
    // Verifica se foi realizada uma busca por nome ou por data
    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';  // Busca por nome do produto
    $dataFiltro = isset($_GET['data']) ? $_GET['data'] : '';  // Filtro de data

    // Inicia a consulta SQL
    $sql = "
        SELECT 
            mr.IDRetirada,
            mr.IDProdutoFK,  -- ID do produto
            e.nomeEstoque AS nomeProduto,  -- Nome do produto
            mr.IDDepartamentoFK,  -- ID do departamento
            d.nomeDep AS nomeDepartamento,  -- Nome do departamento
            mr.qtdRetirada,
            mr.respRetirada,
            mr.dataRetirada,
            mr.horaRetirada
        FROM 
            mov_retirada mr
        LEFT JOIN estoque e ON mr.IDProdutoFK = e.IDEstoque
        LEFT JOIN departamentos d ON mr.IDDepartamentoFK = d.IDDepartamento
    ";

    // Adiciona as condições de filtro (nome e/ou data), se aplicáveis
    $whereClauses = [];  // Array para armazenar as cláusulas WHERE
    if (!empty($busca)) {
        $whereClauses[] = "e.nomeEstoque LIKE :busca";  // Filtro por nome do produto
    }
    if (!empty($dataFiltro)) {
        $whereClauses[] = "mr.dataRetirada = :data";  // Filtro por data
    }

    // Se houver condições de filtro, adiciona a cláusula WHERE
    if (!empty($whereClauses)) {
        $sql .= " WHERE " . implode(" AND ", $whereClauses);
    }

    // Ordena os resultados
    $sql .= " ORDER BY mr.IDRetirada DESC";

    // Prepara e executa a consulta
    $stmt = $conexao->prepare($sql);

    // Liga os parâmetros de busca, se necessário
    if (!empty($busca)) {
        $stmt->bindValue(':busca', '%' . $busca . '%', PDO::PARAM_STR);
    }
    if (!empty($dataFiltro)) {
        $stmt->bindValue(':data', $dataFiltro, PDO::PARAM_STR);
    }

    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalRegistros = $stmt->rowCount();  // Atualiza a variável com o número de registros
} catch (PDOException $e) {
    echo "Erro ao carregar os dados: " . $e->getMessage();
    exit;
}
?>
