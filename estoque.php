<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stl.css">
    <title>ESTOQUE</title>
</head>

<body>
    <form action=""></form>
    <div class="opt">
        </div>
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
                    require_once("./estoquebd.php") ;
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
<button class="bnt-voltar-estoque">
    <a href="index.php">INICIO</a>
</button>

</table>
</div>
</body>

</html>