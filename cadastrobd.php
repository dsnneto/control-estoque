<?php
// informações para serem colocadas no banco
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);
$minimo = filter_input(INPUT_POST, "minimo", FILTER_SANITIZE_NUMBER_INT);
$armazenamento = filter_input(INPUT_POST, "local", FILTER_SANITIZE_NUMBER_INT); // Usa 'local' para 'armazenamento'

try {
    require_once("./conexao/conexao.php");

    // Verifica se os dados estão corretos
    if (empty($nome) || empty($quantidade) || empty($minimo) || empty($armazenamento)) {
        throw new Exception("Todos os campos são obrigatórios.");
    }
    //adicionar "departamento" assim que for solucionar/adicionar as funcionalidades do mesmo
    $comandoSQL = $conexao->prepare("
    INSERT INTO estoque (
        nomeEstoque,
        quantidadeEstoque,
        quantidademinimaEstoque,
        armazenamento,
       
    ) VALUES (
        :nome,
        :quantidade,
        :minimo,
        :armazenamento,
    )
    ");

    
    $departamento = "Default"; // usar assim que for necessário e tiver pronto

    $comandoSQL->execute(array(
        ":nome" => $nome,
        ":quantidade" => $quantidade,
        ":minimo" => $minimo,
        ":armazenamento" => $armazenamento,
        ":departamento" => $departamento // Use um valor real ou remova se não for necessário
    ));

    if ($comandoSQL->rowCount() > 0) {
        header("location:./estoque.php");
        exit();
    } else {
        echo "Falha ao inserir no banco de dados.";
    }
} catch (PDOException $erro) {
    echo "Erro na consulta: " . $erro->getMessage();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
