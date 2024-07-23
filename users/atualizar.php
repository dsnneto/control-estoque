<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Agenda :: Atualizar</title>
</head>
<body>
    <?php require_once("./menu.php"); ?>
    
    <h1 class="titulo">Agenda :: Atualizar</h1>
    <div class="container">
        <?php
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            require_once("./atualizar-view.php");
        ?>
        <form action="./atualizarbd.php" method="post">
            <input 
                type="hidden"
                name="id"
                id="id"
                value="<?=$resultado['idUsuario'];?>">

            <div class="row">
                <div class="col">
                    <label for="nome">Nome</label>
                    <input 
                        type="text" 
                        name="nome" 
                        id="nome"
                        value="<?=$resultado['nomeUsuario'];?>"
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
                        value="<?=$resultado['telefoneUsuario'];?>"
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
                        value="<?=$resultado['userUsuario'];?>"
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
                        value="***"
                        placeholder="Senha com oito digitos.">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="reset" value="VOLTAR">
                    <input type="submit" value="SALVAR">
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>