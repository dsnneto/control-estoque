<?php

require_once("./conexao/conexao.php");

try {

    $buscaValue = isset($_GET['search']) ? $_GET['search'] : '';
    $comandoSQL = "SELECT * FROM estoque WHERE armazenamento = :value";
    $SQL_prepare = $conexao->prepare($comandoSQL);
    $SQL_prepare->execute(array(':value' => $buscaValue));
    $dados = $SQL_prepare->fetchAll();

    $totalRegistros = $SQL_prepare->rowCount();
    if ($dados) {
        
    } else {
        echo "*".htmlspecialchars($buscaValue)."*" ."  não encontrado(a)";
    }
    
} catch (Throwable $th) {
   // echo "Erro: " . $th->getMessage();
}
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilovizu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>ESTOQUE</title>
</head>

<body>
    
        </div>
        <div class="container">
            <table>
            
            <thead>
                <tr>
                    <!--<th >cod <br> prod</th>-->
                    <th>NOME</th>
                    <th>QUANTIDADE</th>
                    <th>CONTROLE</th>
                    <th>EX</th>

                </tr>
            </thead>
            <tbody>
                <?php

                    if ($totalRegistros > 0) {
                    foreach ($dados as $linha) {

                    ?>
                    <tr 
                    <?php 

                    if ($linha["quantidadeEstoque"] <= $linha["quantidademinimaEstoque"] ){
                        echo 'class="qtdMin"';
                    }
                    
                    ?>>
                    <!--<td text align="center"><?= $linha["IDEstoque"]; ?></td>-->
                    <td><?= $linha["nomeEstoque"]; ?></td>
                    <td text align="center"><?= $linha["quantidadeEstoque"]; ?></td>
                    <td text align="center"><a href="./editar.php?id=<?= $linha['IDEstoque']; ?>">
                    EDITAR
                    </a></td> 
                    <td text align="center" ><a href="./excluir.php?id=<?= $linha['IDEstoque']; ?>">X</td>  
                    </tr>
                    
                    <?php
                    }
                    }
                    ?>

</tbody>

    <div class="search">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <form action="./search.php" method="GET">
            
            <input type="text" name="search" value="" width="100PX">
            <a href="./search2.php"><button type="$_POST">BUSCAR</button></a>

        </form>
        <button class="bnt-voltar-estoque">
            <a href="index.php">INICIO</a>
        </button>
    </nav>
    </div>


</table>
</div>


</body>

</html>
