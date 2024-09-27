<h1>BOX2</h1>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stl.css">
    <title>BOX 2</title>
</head>

<body>
    <div class="opt">
        </div>
        <div class="container">
            <table>
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="" selected>selec box</option>
                <option value="./op02.php">BOX 2</option>
                <option value="">BOX 3</option>
                <option value="">BOX 4</option>
                <option value="">BOX 5</option>
                <option value="">BOX 6</option>
                <option value="">BOX 7</option>
                <option value="">BOX 8</option>
                <option value="">BOX 9</option>
                <option value="">BOX 10</option>
                <option value="">BOX 11</option>
                <option value="">BOX 12</option>
                <option value="">BOX 13</option>
                <option value="">BOX 14</option>
                <option value="">BOX 15</option>
                <option value="">BOX 16</option>
            </select>
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
                    <td text align="center" ><a href="./excluir.php?id=<?= $linha['IDEstoque']; ?>"> X</td>  
                    </tr>

                    <?php
                    }
                }
                    ?>

            </tbody>
        </table>
    </div>
        <button class="btn">
            <a href="index.php">VOLTAR</a>
        </button>
</body>

</html>