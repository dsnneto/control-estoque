<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilovizu.css">
    <title>ESTOQUE</title>
</head>

<body>
<!--TESTE RESGISTRO DE MOVIMENTAÇÃO-->
<!--todo o projeto esta na pasta log-->

    <div class="container">
        <table>

            <thead>
                <tr>
                    <!--<th >cod <br> prod</th>-->
                    <th>ITEM</th>
                    <th>MOVIMENTAÇÃO</th>
                    <th>DATA</th>
                    <th>HORA</th>
                    <th>X</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once("./logBD.php");
                if ($totalRegistros > 0) {
                    foreach ($dados as $linha) {

                ?>

                        <!--<td text align="center"><?= $linha["IDM"]; ?></td>-->
                        <td><?= $linha["QtdM"]; ?></td>
                        <td text align="center"><?= $linha["DataM"]; ?></td>
                        <td text align="center"><a href="./excluir.php?id=<?= $linha['IDEM']; ?>">X</td>
                        </tr>

                <?php
                    }
                }
                ?>

            </tbody>



        </table>
    </div>


</body>

</html>