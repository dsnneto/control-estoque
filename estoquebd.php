<?php
require_once ("./conexao/conexao.php");

try {


    $comandoSQL = "SELECT * FROM estoque";

    $dadosSelecionados = $conexao->query($comandoSQL);

    $dados = $dadosSelecionados->fetchAll();

    $totalRegistros = $dadosSelecionados->rowCount();
} catch (PDOException $erro) {
    echo ("Erro estoqueBD");
}

// COMANDOS PARA VERIFICAR TOTAL DE PRODUTOS, PRODUTOS PARA RESTOQUE E PRODUTOS QUE ACABARAM
try {
  $sql_total = "SELECT COUNT(*) AS total_produtos FROM estoque";
  $stmt_total = $conexao->prepare($sql_total);
  $stmt_total->execute();
  $row_total = $stmt_total->fetchAll(PDO::FETCH_ASSOC);
  $total_produtos = $row_total[0]['total_produtos'];

  // Contar produtos perto de acabar
  $sql_perto = "SELECT COUNT(*) AS produtos_perto_de_acabar FROM estoque WHERE quantidadeEstoque <= quantidademinimaEstoque";
  $stmt_perto = $conexao->prepare($sql_perto);
  $stmt_perto->execute();
  $row_perto = $stmt_perto->fetchAll(PDO::FETCH_ASSOC);
  $produtos_perto_de_acabar = $row_perto[0]['produtos_perto_de_acabar'];

  // Contar produtos acabados
  $sql_acabados = "SELECT COUNT(*) AS produtos_acabados FROM estoque WHERE quantidadeEstoque = 0";
  $stmt_acabados = $conexao->prepare($sql_acabados);
  $stmt_acabados->execute();
  $row_acabados = $stmt_acabados->fetchAll(PDO::FETCH_ASSOC);
  $produtos_acabados = $row_acabados[0]['produtos_acabados'];

  // Exibir resultados
  //echo "<p>Total de produtos no estoque: " . $total_produtos . "</p> <br>";
  //echo "<p>Produtos perto de acabar: " . $produtos_perto_de_acabar . "</p> <br>";
  //echo "<p>Produtos acabados: " . $produtos_acabados . "</p><br>";

} catch (PDOException $erro) {
 echo "Deu errado";
}



