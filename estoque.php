<?php

$title = 'SCE | Estoque';
require_once './layout/head.php';
require_once './layout/navbar.php';
require_once './layout/sidebar.php';
require_once './layout/script.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
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
                <!-- <button type="button" class="btn btn-outline-danger">Retirar Produto</button> -->
                <!-- <button type="button" class="btn btn-outline-secondary">Adicionar Produto</button> -->
                <button type="button" class="btn" data-toggle="modal" data-target="#modalAdicionar" ><img src="./style/icon/mais-pequeno.png">ADD ITEM</button>
                
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
                        <td text align="center"><a href="#" class="btn" data-toggle="modal" data-target="#modalEditar" data-id="<?= $linha['IDEstoque']; ?>" data-nome=" <?= $linha['nomeEstoque']; ?>" data-quantidade="<?= $linha['quantidadeEstoque']; ?>"><img src="./style/icon/lapis.png"></a><a text align="center"><a href="./excluir.php?id=<?= $linha['IDEstoque']; ?>"><img src="./style/icon/cruz.png"></a></td>
                       
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
    require_once("./conexao/conexao.php");
?>

  <!-- Modal para add Produto -->
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
                <form action="./estoquebd.php" method="post">
                    <label for="nome">
                        <input type="text" name="nome" id="nome" placeholder="Nome do produto" required>
                    </label>

                    <label for="departamento">
                        <input type="text" name="departamento" id="departamento" placeholder="Departamento" required>
                    </label>

                    <label for="quantidade">
                        <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade atual" required>
                    </label>

                    <label for="minimo">
                        <input type="number" name="minimo" id="minimo" placeholder="Quantidade mínima" required>
                    </label>

                    <label for="local">
                        <select name="local" id="local" required>
                            <option value="">Selecione o Local</option>
                            <?php
                            // Carregar locais do banco de dados
                            $sql = "SELECT IDLocal, nomeLocal FROM local_arm";
                            $result = $conexao->query($sql);
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['IDLocal'] . "'>" . $row['nomeLocal'] . "</option>";
                            }
                            ?>
                        </select>
                    </label>

                    <button type="submit">Salvar</button>
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
            <form action="./editarbd.php" method="POST">

        <input
        type="hidden"
        name="id"
        id="id"
        value="<?=$resultado['IDEstoque']?>">
        <!--pega o id-->


        <div class="row">
                <div class="col">
                    <label for="quantidade">NOME</label>
                    <input type="text" value="<?=$resultado['nomeEstoque']?>" name="nome" id="nome" placeholder="Digite o nome do item">
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

