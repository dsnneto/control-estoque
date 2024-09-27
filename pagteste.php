<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 200px;
            background-color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
        }
        .menu-item {
            padding: 15px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-bottom: 1px solid #444;
            cursor: pointer;
        }
        .menu-item.active {
            background-color: #555;
        }
        .content {
            margin-left: 200px;
            padding: 20px;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="./pagteste.php" class="menu-item">Item 1</a>
        <a href="#" class="menu-item">Item 2</a>
        <a href="#" class="menu-item">Item 3</a>
    </div>
    <div class="content">
        <h1>Conteúdo da Página</h1>
        <p>Bem-vindo ao conteúdo da página.</p>
    </div>

    <script>
        // Obtém todos os itens do menu
        const menuItems = document.querySelectorAll('.menu-item');

        // Adiciona um evento de clique para cada item do menu
        menuItems.forEach(item => {
            item.addEventListener('click', function(event) {
                // Se o link não tiver um href válido, prevenir o comportamento padrão
                if (this.getAttribute('href') === '#') {
                    event.preventDefault();
                }

                // Remove a classe 'active' de todos os itens
                menuItems.forEach(i => i.classList.remove('active'));

                // Adiciona a classe 'active' ao item clicado
                this.classList.add('active');
            });
        });

        // Marcar o item ativo com base na URL atual
        const currentUrl = window.location.href;
        menuItems.forEach(item => {
            if (item.href === currentUrl) {
                item.classList.add('active');
            }
        });
    </script>
</body>
</html>
