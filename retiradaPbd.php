<?php
require_once("./conexao/conexao.php");

$totalRegistros = 0; 

try {
    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';  // Busca por nome do produto
    $dataFiltro = isset($_GET['data']) ? $_GET['data'] : '';  // Filtro de data

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

    $whereClauses = [];  
    if (!empty($busca)) {
        $whereClauses[] = "e.nomeEstoque LIKE :busca";  
    }
    if (!empty($dataFiltro)) {
        $whereClauses[] = "mr.dataRetirada = :data";  
    }

    
    if (!empty($whereClauses)) {
        $sql .= " WHERE " . implode(" AND ", $whereClauses);
    }

    $sql .= " ORDER BY mr.dataRetirada DESC, mr.horaRetirada DESC LIMIT 10";

    $stmt = $conexao->prepare($sql);

    if (!empty($busca)) {
        $stmt->bindValue(':busca', '%' . $busca . '%', PDO::PARAM_STR);
    }
    if (!empty($dataFiltro)) {
        $stmt->bindValue(':data', $dataFiltro, PDO::PARAM_STR);
    }

    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalRegistros = $stmt->rowCount();  
} catch (PDOException $e) {
    echo "Erro ao carregar os dados: " . $e->getMessage();
    exit;
}
