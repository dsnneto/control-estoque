<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Estoque: Home</title>
</head>
<body>
    
    <header>
        <?php require_once('./_header.php'); ?>
    </header>

    <section class="main">
        <!--SIDEBAR-->
        <?php require_once('./_sidebar.php');?>

        <!--PAGE CONTENT-->
        <div class="content">
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
                        require_once("../estoquebd.php") ;
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
        
            <form action="./search.php" method="GET">
                
                <input type="text" name="search" value="" width="100PX">
                <button type="$_POST">BUSCAR</button>

            </form>
            <button class="bnt-voltar-estoque">
                <a href="index.php">INICIO</a>
            </button>
        </div>


    </table>
</div>
        </div>
    </section>

</body>
</html>