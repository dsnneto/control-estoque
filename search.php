<?php

require_once("./conexao/conexao.php");

try {

    $buscaValue = isset($_GET['search']) ? $_GET['search'] : '';
    $sql = "SELECT * FROM estoque WHERE armazenamento = :value";
    $comandoSQL = $conexao->prepare($sql);
    $comandoSQL->execute(array(':value' => $buscaValue));
    $resultado = $comandoSQL->fetch();

    if ($resultado) {
        print_r($resultado);
    } else {
        echo "*".htmlspecialchars($buscaValue)."*" ."  não encontrado(a)";
    }

} catch (Throwable $th) {
   // echo "Erro: " . $th->getMessage();
}
?>
