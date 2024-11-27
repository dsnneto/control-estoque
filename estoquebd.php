<?php

// Cadastro dos produtos com seus respectivos campos
require_once ("./conexao/conexao.php");


// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}

$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);
$minimo = filter_input(INPUT_POST, "minimo", FILTER_SANITIZE_NUMBER_INT);
$armazenamento = filter_input(INPUT_POST, "local", FILTER_SANITIZE_NUMBER_INT); // Captura o local
$departamento = filter_input(INPUT_POST, "departamento", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Captura o departamento

try {
    $comandoSQL = $conexao->prepare("
    INSERT INTO estoque (
        nomeEstoque,
        quantidadeEstoque,
        quantidademinimaEstoque,
        armazenamento,
        departamento 
    ) VALUES (
        :nome,
        :quantidade,
        :minimo,
        :armazenamento,
        :departamento
    )");

    $comandoSQL->execute(array(
        ":nome" => $nome,
        ":quantidade" => $quantidade,
        ":minimo" => $minimo,
        ":armazenamento" => $armazenamento,
        ":departamento" => $departamento // Corrige o parâmetro
    ));

    if ($comandoSQL->rowCount() > 0) {
        header("location:./estoque.php");
        exit();
    } else {
        echo "Falha ao inserir no banco de dados.";
    }
} catch (PDOException $erro) {
    // echo "Erro na consulta: " . $erro->getMessage();
}
try {
    
    $dados = [];
    $totalRegistros = 0;

    if (isset($_GET['busca']) && !empty($_GET['busca'])) {
        $busca = $_GET['busca'];
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
  

//exibição dos items na dashboard
try {
    $sql_total = "SELECT COUNT(*) AS total_produtos FROM estoque";
    $stmt_total = $conexao->prepare($sql_total);
    $stmt_total->execute();
    $row_total = $stmt_total->fetch(PDO::FETCH_ASSOC);
    $total_produtos = $row_total['total_produtos'];

    // minimo
    $sql_perto = "SELECT COUNT(*) AS produtos_perto_de_acabar FROM estoque WHERE quantidadeEstoque <= quantidademinimaEstoque";
    $stmt_perto = $conexao->prepare($sql_perto);
    $stmt_perto->execute();
    $row_perto = $stmt_perto->fetch(PDO::FETCH_ASSOC);
    $produtos_perto_de_acabar = $row_perto['produtos_perto_de_acabar'];

    //zerado
    $sql_acabados = "SELECT COUNT(*) AS produtos_acabados FROM estoque WHERE quantidadeEstoque = 0";
    $stmt_acabados = $conexao->prepare($sql_acabados);
    $stmt_acabados->execute();
    $row_acabados = $stmt_acabados->fetch(PDO::FETCH_ASSOC);
    $produtos_acabados = $row_acabados['produtos_acabados'];

} catch (PDOException $erro) {
    echo "Deu errado: " . $erro->getMessage();
}



try {
    $dados = [];
    $totalRegistros = 0;

    if (isset($_GET['busca']) && !empty($_GET['busca'])) {
        $busca = "%" . $_GET['busca'] . "%"; // Adiciona % para busca parcial

        // Ajuste no SQL para fazer a busca em nomeEstoque, departamento e nomeLocal
        $comandoSQL = "
            SELECT 
                e.IDEstoque,
                e.nomeEstoque,
                e.quantidadeEstoque,
                e.quantidademinimaEstoque,
                e.armazenamento,
                la.nomeLocal AS nomeArmazenamento,
                e.departamento,
                d.nomeDep AS nomeDepartamento
            FROM 
                estoque e
            LEFT JOIN local_arm la ON e.armazenamento = la.IDLocal
            LEFT JOIN departamentos d ON e.departamento = d.IDDepartamento
            WHERE e.nomeEstoque LIKE :busca 
            OR d.nomeDep LIKE :busca
            OR la.nomeLocal LIKE :busca
        ";

        $stmt = $conexao->prepare($comandoSQL);
        $stmt->execute(['busca' => $busca]);
    } else {
        // Se não houver busca, traz todos os registros
        $comandoSQL = "
            SELECT 
                e.IDEstoque,
                e.nomeEstoque,
                e.quantidadeEstoque,
                e.quantidademinimaEstoque,
                e.armazenamento,
                la.nomeLocal AS nomeArmazenamento,
                e.departamento,
                d.nomeDep AS nomeDepartamento
            FROM 
                estoque e
            LEFT JOIN local_arm la ON e.armazenamento = la.IDLocal
            LEFT JOIN departamentos d ON e.departamento = d.IDDepartamento
        ";

        $stmt = $conexao->query($comandoSQL);
    }

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalRegistros = $stmt->rowCount();
} catch (PDOException $erro) {
    echo "Erro ao realizar a busca: " . $erro->getMessage();
}

?>



