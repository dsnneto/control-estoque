<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        .produto {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <div id="produtos">
        <div class="produto">
            Produto 1 <button onclick="retirarProduto(this)">Retirar</button>
        </div>
        <div class="produto">
            Produto 2 <button onclick="retirarProduto(this)">Retirar</button>
        </div>
        <div class="produto">
            Produto 3 <button onclick="retirarProduto(this)">Retirar</button>
        </div>
    </div>

    <script>
        function retirarProduto(button) {
            const produto = button.parentElement;
            produto.remove();
        }
    </script>
</body>
</html>
