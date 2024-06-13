<!--Cadastrar de novos produtos -->

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
        
        <form action="./cadastrobd.php" method="post">
            <h1>ADICIONAR ITEM</h1>
            <div class="row">
                <div class="col">
                    <label for="nome">Nome do produto</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome do novo produto">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" placeholder="Digite a quantidade atual">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="minimo">Quantidade minima</label>
                    <input type="number" name="minimo" id="minimo" placeholder="Digite a quantidade  min">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="SALVAR">
                    <button class="bnt-vizu-cadastro"><a href="estoque.php">VIZUALIZAR</a>   </button>
                </div>
            </div>

        </form>

    </div>
    </div>
    </div>
</body>

</html>