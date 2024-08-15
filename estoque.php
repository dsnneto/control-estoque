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
        <div class="container">
            <table>
            
                <thead>
                    <tr>

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
                    <td text align="center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal-edit">edit</button></td> 
                    <td text align="center" ><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">x</button></td>  
                    </tr>
                    
                    <?php
                    }
                    }
                    ?>


                </tbody>

                <!------------------------------------------BARRA DE NAV------------------------------------>
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                
                        <div class="container-fluid">
                        <form action="./search.php" method="GET">
                            
                            <input type="text" name="search" value="" width="100PX">
                            <button type="$_POST">BUSCAR</button>
                    
                        </form>
                        <button class="bnt-voltar-estoque">
                            <a href="index.php">INICIO</a>
                        </button>
                        <span>user</span>
                    
                        </div>
                </nav>
 
            </table>
</div>
                <!------------------------------------------MODAL EX------------------------------------>

<body>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        
        <div class="modal-body">
        <h1 class="titulo">Excluir</h1>
        <div class="container">
            
            <?php
                $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                require_once("./excluirbd.php");
                
            ?>
            
            <form action="./excluir-view.php" method="POST">

                <div class="row">
                    <div class="col">
                        
                        <input
                        type="hidden"  name="id" id="id" value="<?=$resultado["IDEstoque"]; ?>">
                        </input>

                        <input
                        type="hidden"  name="nome"  id="nome" value="<?=$resultado["nomeEstoque"]; ?>" disabled>
                        </input>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <input 
                            type="submit" 
                            value="E X C L U I R"
                            style="background-color: red; border: 1px solid red;">
                    </div>
                </div>
            </form>
        </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
        </div>

        </div>
    </div>
    </div>

    </body>
</html>



                <!------------------------------------------MODAL EDIT------------------------------------>

    
    <div class="modal fade" id="myModal-edit">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-body">
                    <div class="container">
        <?php
                $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                require_once ("./editarbd.php");
        ?>
        <form action="./editarbd.php" method="post">
            <h1>Editar item</h1>

        <input
        type="hidden"
        name="id"
        id="id"
        value="<?=$resultado['IDEstoque']?>">
        <!--pega o id-->


        <div class="row">
                <div class="col">
                    <label for="quantidade">NOME</label>
                    <input type="text" value="<?=$linha['nomeEstoque']?>" name="nItem" id="nItem" placeholder="Digite o nome do item">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="quantidade">quantidade</label>
                    <input type="number" value="<?=$resultado['quantidadeEstoque']?>" name="quantidade" id="quantidade" placeholder="Digite a quantidade atual disponivel">
                </div>
            </div>

            <div class="row" style="opacity: 0;">
                <div class="col">
                    <label for="minimo" >quantidade minima</label>
                    <input type="number" value="<?=$resultado['quantidademinimaEstoque']?>"name="minimo" id="minimo" placeholder="Digite a quantidade  minima de produtos">
                </div>
            </div>

            <div class="row">
                <div class="col">
                
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="SALVAR">
                    <input 
                        type="submit" 
                        value="E X C L U I R"
                        style="background-color: red; border: 1px solid red;">
                </div>
            </div>

        </form>

    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                    </div>

                    </div>
                </div>
    </div>

</html>

