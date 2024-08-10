<!--Cadastrar de novos produtos -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Item</title>
    <link rel="stylesheet" href=".\css\estilovizu.css">
</head>

<body>
    <div class="container-CAD">
        
        <form action="./cadastrobd.php" method="post">
            <h1>ADICIONAR ITEM</h1>
            <div class="row">
                <div class="col">
                    <label for="nome">
                    <span>NOME ITEM</span>
                    <input type="text" name="nome" id="nome" placeholder="Nome do novo produto">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="quantidade">
                    <span>QTD ATUAL</span>
                    <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade atual" required>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="minimo">
                    <span>QTD MIN</span>
                    <input type="text" name="minimo" id="minimo" placeholder="Quantidade minima">
                    </label>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="minimo">
                    <span>LOCAL</span>
                    <input type="text" name="arm" id="arm" placeholder="Box - armário - estante">
                    </label>
                </div>
            </div>

            <div class="row-bnt">
                <div class="col">
                <input type="submit" value="SALVAR">
                <button class="btn-viewest"><a href="estoque.php">VIZUALIZAR</a></button>

                </div>
            </div>

        </form>

    </div>
    </div>
    </div>
</body>

</html>