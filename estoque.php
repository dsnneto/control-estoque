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
                <div class="input-group">
                  <input type="search" class="form-control form-control-lg" placeholder="Nome do Produto">
                  <button type="submit" class="btn btn-lg btn-default">
                    <i class="fa fa-search"></i>
                  </button>

                </div>
              </div>
              <div class="button-group">
                <button type="button" class="btn btn-outline-danger">Retirar Produto</button>
                <button type="button" class="btn btn-outline-secondary">Adicionar Produto</button>
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
                    require_once("./estoquebd.php") ;
                    if ($totalRegistros > 0) {
                    foreach ($dados as $linha) {

                    ?>
                    <tr
                    <?php

                    if ($linha["quantidadeEstoque"] <= $linha["quantidademinimaEstoque"] ){
                        echo 'class="qtdMin"';
                    }

                    ?>>
                    <!--<td text align="center"><?= $linha["IDEstoque"]; ?></td>-->
                    <td><?= $linha["nomeEstoque"]; ?></td>
                    <td text align="center"><?= $linha["quantidadeEstoque"]; ?></td>
                    <td text align="center"><?= $linha["armazenamento"]; ?></td>
                    <td text align="center"><?= $linha["departamento"]; ?></td>
                    <td text align="center"><a href="./editar.php?id=<?= $linha['IDEstoque']; ?>">
                    EDITAR
                    </a></td>
                    <td text align="center" ><a href="./excluir.php?id=<?= $linha['IDEstoque']; ?>">X</td>
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

<?php require_once './layout/script.php'; ?>
