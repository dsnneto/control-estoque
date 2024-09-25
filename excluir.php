<i?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stl.css">
    <title> Excluir</title>
</head>
<body>
    <h1 class="titulo">Excluir</h1>
    <div class="container">
        
        <?php
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            require_once("./layout/script.php");
        ?>
        
        <form action="./excluirbd.php" method="POST">

            <div class="row">
                <div class="col">
                    <label for="nome">DESEJA REALMENTE EXCLUIR O ITEM: <b><?=$linha["nomeEstoque"]?></b> ?</label>
                    <input
                    type="hidden" 
                        name="id" 
                        id="id"
                        value="<?=$resultado["IDEstoque"]; ?>">
                    </input>

                    <input
                    type="hidden" 
                        name="nome" 
                        id="nome"
                        value="<?=$resultado["nomeEstoque"]; ?>"
                        disabled>
                    </input>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="reset" value="VOLTAR">
                    <input 
                        type="submit" 
                        value="E X C L U I R"
                        style="background-color: red; border: 1px solid red;">
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>