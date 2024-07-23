<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda :: Visualização</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <?php require_once("./menu.php"); ?>
    
    <h1 class="titulo">Visualização</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>NOME</th>
                    <th width="350">FONE</th>
                    <th width="70">ED</th>
                    <th width="70">EX</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("./visualizacaobd.php");
                    if($totalRegistros > 0){
                       foreach($dados as $linha){
                ?>
                <tr>
                    <td align="center"><?=$linha["idUsuario"];?></td>
                    <td><?=$linha["nomeUsuario"];?></td>
                    <td><?=$linha["telefoneUsuario"];?></td>
                    <td align="center">
                        <a href="./atualizar.php?id=<?=$linha['idUsuario'];?>">
                            <img src="./img/atualizar.png" alt="Atualizar">
                        </a>
                    </td>
                    <td align="center">
                        <a href="./excluir.php?id=<?=$linha['idUsuario'];?>">
                            <img src="./img/excluir.png" alt="Excluir">
                        </a>
                    </td>
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