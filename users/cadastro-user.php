<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Cadastro</title>
</head>
<body>
    <?php require_once("./menu.php"); ?>
    
    <h1 class="titulo">Cadastro de usuário</h1>
    <div class="container">
        <form action="./cadastrobd.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="nome">Nome</label>
                    <input 
                        type="text" 
                        name="nome" 
                        id="nome"
                        placeholder="Nome completo do usuário.">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="fone">Telefone</label>
                    <input 
                        type="tel" 
                        name="fone" 
                        id="fone"
                        placeholder="Telefone para contato">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="usuario">Usuário</label>
                    <input 
                        type="text" 
                        name="usuario" 
                        id="usuario"
                        placeholder="Nome de usuário.">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="senha">Senha</label>
                    <input 
                        type="password" 
                        name="senha" 
                        id="senha"
                        placeholder="Senha com oito digitos.">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="reset" value="VOLTAR">
                    
                    
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>