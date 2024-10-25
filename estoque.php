<?php
// HTML HEAD
$title = 'SCE | Estoque';
require_once './layout/head.php';

// NAV HEADER
require_once './layout/navbar.php';

// SIDEBAR AND SIDEBAR MENU
require_once './layout/sidebar.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Estoque</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Estoque</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="search-container">
                <!-- Começo sistema de busca-->
                <form method="GET" action="">
                  <div class="input-group">
                    <input type="search" name="busca" class="form-control form-control-lg" placeholder="Nome do Produto">
                    <button type="submit" class="btn btn-lg btn-default">
                      <i class="fa fa-search"></i>
                    </button>
                </div>
                </form>
              </div>
              <div class="button-group">
                <button type="button" class="btn btn-outline-danger">Retirar Produto</button>
                <!-- <button type="button" class="btn btn-outline-secondary">Adicionar Produto</button> -->
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalAdicionar" >Adicionar Produto</button>
                
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Departamento</th>
                    <th>Armazenamento</th>
                    <th>Editar</th>
                    <th>Excluir</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once("./estoquebd.php");
                  if ($totalRegistros > 0) {
                    foreach ($dados as $linha) {

                  ?>
                      <tr <?php

                          if ($linha["quantidadeEstoque"] <= $linha["quantidademinimaEstoque"]) {
                            echo 'class="qtdMin"';
                          }

                          ?>>
                        <!--<td text align="center"><?= $linha["IDEstoque"]; ?></td>-->
                        <td><?= $linha["nomeEstoque"]; ?></td>
                        <td text align="center"><?= $linha["quantidadeEstoque"]; ?></td>
                        <td text align="center"><?= $linha["departamento"]; ?></td>
                        <td text align="center"><?= $linha["armazenamento"]; ?></td>
                        <td text align="center"><a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEditar" data-id="<?= $linha['IDEstoque']; ?>" data-nome="<?= $linha['nomeEstoque']; ?>" data-quantidade="<?= $linha['quantidadeEstoque']; ?>">Editar</a></td>

                        <td text align="center"><a href="./excluir.php?id=<?= $linha['IDEstoque']; ?>">X</td>
                      </tr>

                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal para Adicionar Produto -->
<?php
    $dns = "mysql:host=localhost;dbname=bdestoque;charset=utf8";
    $user= "root";
    $pass= "";

    try {

        $conexao = new PDO($dns, $user, $pass);
        //echo "Conectado com sucesso!";

        // Definir o modo de erro para exceções
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $erro) {
        //echo $erro->getMessage();
        echo "Entre em contato com o desenvolvedor";
    }
?>

<!-- Modal para Adicionar Produto -->
<?php
// Conectar ao banco de dados
$dns = "mysql:host=localhost;dbname=bdestoque;charset=utf8";
$user= "root";
$pass= "";

try {
    $conexao = new PDO($dns, $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
    exit; // Para evitar continuar com o restante do código
}

// Consultar locais
$sql = "SELECT idLocal, nLocal FROM local_arm";
$result = $conexao->query($sql);
?>

<!-- Modal para Adicionar Produto -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdicionarLabel">Adicionar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./cadastrobd.php" method="post">
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
                                <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade atual">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="minimo">
                                <span>QTD MIN</span>
                                <input type="text" name="minimo" id="minimo" placeholder="Quantidade mínima">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="input-group mt-3 mb-3">
                                <select name="local" id="local" class="form-select">
                                    <option value="">ESCOLHA O LOCAL</option>
                                    <?php
                                    // Verifica se a consulta foi bem-sucedida
                                    if ($result) {
                                        // Saída de dados de cada linha
                                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row["idLocal"] . "'>" . trim($row["nLocal"]) . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Erro ao carregar locais</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success">SALVAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Fechar a conexão
$conexao = null;
?>



<script>
    function setLocal(local) {
        document.getElementById('arm').value = local;
    }
</script>

<!-- Modal para Editar Produto -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    <input type="text" value="<?=$resultado['nomeEstoque']?>" name="nItem" id="nItem" placeholder="Digite o nome do item">
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
</div>

<?php require_once './layout/script.php'; ?>

<script>

$('#modalAdicionar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nome = button.data('nome');
            var modal = $(this);
            modal.find('#produtoAdicionar').val(nome);
            modal.find('#idProdutoAdicionar').val(id);
        });

$('#modalEditar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nome = button.data('nome');
            var quantidade = button.data('quantidade');
            var modal = $(this);
            modal.find('#produtoEditar').val(nome);
            modal.find('#quantidadeEditar').val(quantidade);
            modal.find('#idProdutoEditar').val(id);
        });
</script>