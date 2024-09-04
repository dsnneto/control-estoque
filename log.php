<?php
// HTML HEAD
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
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Produto</th>
                    <th>Qua</th>
                    <th>Departamento</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                require_once("./logBD.php");
                if ($totalRegistros > 0) {
                    foreach ($dados as $linha) {

                ?>

                    <?= $linha["IDM"]; ?></td>
                    <td text align="center"><?= $linha['NomeEM']?></td>
                    <td text align="center"><?= $linha["QtdM"]; ?></td>
                    <td text align="center"><?= $linha["AlteradoM"]; ?></td>

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
