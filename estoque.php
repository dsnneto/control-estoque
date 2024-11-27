<?php

$title = 'SCE | Estoque';
require_once './layout/head.php';
require_once './layout/navbar.php';
require_once './layout/sidebar.php';
require_once './layout/script.php';

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
                <!-- <button type="button" class="btn btn-outline-danger">Retirar Produto</button> -->
                <!-- <button type="button" class="btn btn-outline-secondary">Adicionar Produto</button> -->
                <button type="button" class="btn" data-toggle="modal" data-target="#modalAdicionar"><img src="./style/icon/mais-pequeno.png">ADD ITEM</button>

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

                        <td><?= $linha["nomeEstoque"]; ?></td>
                        <td text align="center"><?= $linha["quantidadeEstoque"]; ?></td>
                        <td text align="center"><?= $linha["nomeDepartamento"]; ?></td>
                        <td text align="center"><?= $linha["nomeArmazenamento"]; ?></td>
                        <td text align="center"><a href="#" class="btn" data-toggle="modal" data-target="#modalEditar" data-id="<?= $linha['IDEstoque']; ?>" data-nome=" <?= $linha['nomeEstoque']; ?>" data-quantidade="<?= $linha['quantidadeEstoque']; ?>"><img src="./style/icon/lapis.png"></a>
                        <a text align="center">
                        <a href="#" class="btn" data-toggle="modal" data-target="#modalConfirmarExcluir" 
                          data-id="<?= $linha['IDEstoque']; ?>"
                          data-nome="<?= $linha['nomeEstoque']; ?>"
                          data-quantidade="<?= $linha['quantidadeEstoque']; ?>">
                          <img src="./style/icon/cruz.png">
                          </a></td>
                        <td>
                          <a text aling="center" href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalRetirar"
                            data-id="<?= $linha['IDEstoque'] ?>"
                            data-nome="<?= $linha['nomeEstoque'] ?>"
                            data-quantidade="<?= $linha['quantidadeEstoque'] ?>"
                            data-armazenamento-id="<?= $linha['armazenamento'] ?>"
                            data-departamento-id="<?= $linha['departamento'] ?>"
                            data-armazenamento="<?= $linha['nomeArmazenamento'] ?>"
                            data-departamento="<?= $linha['nomeDepartamento'] ?>"
                            id="btnRetirar">
                            -
                          </a>

                          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalRepor"
                            data-id="<?= $linha['IDEstoque'] ?>"
                            data-nome="<?= $linha['nomeEstoque'] ?>"
                            data-quantidade="<?= $linha['quantidadeEstoque'] ?>"
                            data-armazenamento-id="<?= $linha['armazenamento'] ?>"
                            data-departamento-id="<?= $linha['departamento'] ?>"
                            data-armazenamento="<?= $linha['nomeArmazenamento'] ?>"
                            data-departamento="<?= $linha['nomeDepartamento'] ?>"
                            id="btnRepor">
                            +
                          </a>
                        </td>


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
              try {
                // Carregar locais do banco de dados
                $sql = "SELECT IDLocal, nomeLocal FROM local_arm";
                $result = $conexao->query($sql);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='" . $row['IDLocal'] . "'>" . $row['nomeLocal'] . "</option>";
                }
              } catch (\Throwable $th) {
                echo "<option>Nenhum local disponivel</option>";
              }

              ?>
            </select>
          </label>

          <label for="departamento">
            <select name="departamento" id="departamento" required>
              <option value="">Selecione o Departamento</option>
              <?php
              try {
                // Carregar departamentos do banco de dados
                $sql = "SELECT IDDepartamento, nomeDep FROM departamentos";
                $result = $conexao->query($sql);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='" . $row['IDDepartamento'] . "'>" . $row['nomeDep'] . "</option>";
                }
              } catch (\Throwable $th) {
                echo "<option>Nenhum departamento disponivel</option>";
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

<!-- Modal para confirmação de exclusão -->
<div class="modal fade" id="modalConfirmarExcluir" tabindex="-1" role="dialog" aria-labelledby="modalConfirmarExcluirLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConfirmarExcluirLabel">Confirmar Exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modalMensagem">Tem certeza que deseja excluir o item?</p>
        <!-- Formulário para Excluir o Produto -->
        <form method="POST" action="excluirbd.php">
          <input type="hidden" name="id" id="idEstoqueExcluir"> <!-- ID do item a ser excluído -->
          <button type="submit" class="btn btn-danger">Excluir</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Retirada -->
<div class="modal fade" id="modalRetirar" tabindex="-1" role="dialog" aria-labelledby="modalRetirarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRetirarLabel">Retirar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formRetirada" method="POST" action="retirarbd.php">
          <div class="row g-2">

            <div class="col-6">
              <label for="quantidadeRetirada">Quantidade a Retirar</label>
              <input type="number" class="form-control" id="quantidadeRetirada" name="quantidadeRetirada" required>
            </div>

            <div class="col-6">
              <label for="responsavelRetirada">Responsável pela Retirada</label>
              <input type="text" class="form-control" id="responsavelRetirada" name="responsavelRetirada" placeholder="Informe o responsável" required>
            </div>

          </div>
          <hr color="grey">
          <div class="row g-2">

            <div class="col-6">
              <label for="nomeProduto">Nome do Produto</label>
              <input type="text" class="form-control" id="nomeProduto" readonly>
            </div>

            <div class="col-6">
              <label for="quantidadeEstoque">Quantidade no Estoque</label>
              <input type="number" class="form-control" id="quantidadeEstoque" readonly>
            </div>

            <div class="col-6">
              <label for="armazenamento">Armazenamento</label>
              <input type="text" class="form-control" id="armazenamentoNome" readonly>
              <input type="hidden" id="armazenamentoID" name="armazenamentoID">
            </div>

            <div class="col-6">
              <label for="departamento">Departamento</label>
              <input type="text" class="form-control" id="departamentoNome" readonly>
              <input type="hidden" id="departamentoID" name="departamentoID">
            </div>
          </div>
          <br>
          <br>

          <input type="hidden" id="idEstoque" name="idEstoque">
          <button type="submit" class="btn btn-primary">Confirmar Retirada</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!--Modal de repor-->
<div class="modal fade" id="modalRepor" tabindex="-1" role="dialog" aria-labelledby="modalReporLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRetirarLabel">Retirar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formRetirada" method="POST" action="reporbd.php">
          <div class="row g-2">

            <div class="col-6">
              <div>
                <label for="quantidadeRetirada">Quantidade a Repor</label>
                <input type="number" class="form-control" id="quantidadeRepor" name="quantidadeRepor" required>
              </div>
              

            </div>
<br>
<hr color="grey">
<br>
            <div class="row g-2">

              <div class="col-6">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" id="nomeProd" readonly>
              </div>

              <div class="col-6">
                <label for="quantidadeEstoque">Quantidade no Estoque</label>
                <input type="number" class="form-control" id="qtdEstoque" readonly>
              </div>

              <div class="col-6">
                <label for="armazenamento">Armazenamento</label>
                <input type="text" class="form-control" id="nomeArmazenamento" readonly>
                <input type="hidden" id="armazenamento-ID" name="armazenamento-ID">
              </div>

              <div class="col-6">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" id="nomeDepartamento" readonly>
                <input type="hidden" id="departamento-ID" name="departamento-ID">
              </div>
            </div>
            <br>
            <br>

            <input type="hidden" id="idProduto" name="idProduto">
            <button type="submit" class="btn btn-success">Confirmar Reposição</button>
        </form>

      </div>
    </div>
  </div>
</div>