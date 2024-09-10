<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form class="conteudo" action="./users/valida-senha.php" method="post">
                <div class="row">
                    <div class="col">
                        <label for="usuario">Usuário</label>
                        <input type="text"
                        name="user"
                        id="user"
                        placeholder="Nome de usuário">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="senha">Senha</label>
                        <input type="password"
                        name="senha"
                        id="senha"
                        placeholder="Senha">
                    </div>
                </div>
                <div class="row row-input">
                    <div class="col col-checkbox">
                        <input type="checkbox"
                        id="checkbox">
                        <label for="checkbox" id="checkbox-label">Lembrar de mim</label>
                    </div>
                    <div class="col">
                        <a href="#" id="esqueci-senha">Esqueci minha senha</a>
                    </div>
                </div>
                <div class="row">
                    <input type="submit"
                    name="login"
                    placeholder="Login">
                </div>
            </form>
    </div>
</body>
</html>
