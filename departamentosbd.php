<?php
header('Content-Type: application/json');

// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'bdestoque';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erro de conexão: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro de conexão com o banco de dados']);
    exit;
}

// Verifica o método da requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nomeDep = filter_input(INPUT_POST, 'nomeDep', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (empty($nomeDep)) {
        echo json_encode(['success' => false, 'message' => 'O nome do departamento é obrigatório.']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO departamentos (nomeDep) VALUES (:nomeDep)");
        $stmt->bindParam(':nomeDep', $nomeDep);

        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'IDDepartamento' => $pdo->lastInsertId(),
                'nomeDep' => $nomeDep
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao inserir no banco de dados.']);
        }
    } catch (PDOException $e) {
        error_log("Erro ao inserir departamento: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Erro ao inserir departamento.']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $pdo->query("SELECT IDDepartamento, nomeDep FROM departamentos");
        $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['success' => true, 'departamentos' => $departamentos]);
    } catch (PDOException $e) {
        error_log("Erro ao buscar departamentos: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Erro ao buscar departamentos.']);
    }
}