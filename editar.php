<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Item</title>
    <link rel="stylesheet" href="./css/stl.css">
</head>

<body>
    <div class="container">
        <?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
require_once ("./editar-view.php");
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
                    <button class="bnt-voltaredit">VOLTAR</button>
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
    </div>
</body>

</html>