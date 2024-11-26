<?php
$title = 'RELATÓRIO';
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
          <h1>Produtos retirados</h1>
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
                    <!-- Campo para buscar pelo nome do produto -->
                    <input type="text" name="busca" class="form-control form-control-lg" placeholder="Nome do Produto">
                    <!-- Campo para buscar pela data -->
                    <input type="date" name="data" class="form-control form-control-lg">
                    <button type="submit" class="btn btn-lg btn-default">
                      <i class="fa fa-search"></i> Buscar
                    </button>
                  </div>
                </form>


              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Departamento</th>
                    <th>Usuário</th>
                    <th>Quantidade</th>
                    <th>Responsável</th>
                    <th>Data</th>
                    <th>Hora</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once('./retiradaPbd.php');
                  if ($totalRegistros > 0) { ?>
                    <?php foreach ($dados as $linha) { ?>
                      <tr>
                        <td><?php echo htmlspecialchars($linha['nomeProduto']); ?></td>
                        <td><?php echo htmlspecialchars($linha['nomeDepartamento']); ?></td>
                        <td><?php echo htmlspecialchars($linha['IDProdutoFK']); ?></td>
                        <td><?php echo htmlspecialchars($linha['qtdRetirada']); ?></td>
                        <td><?php echo htmlspecialchars($linha['respRetirada']); ?></td>
                        <td><?php echo htmlspecialchars($linha['dataRetirada']); ?></td>
                        <td><?php echo htmlspecialchars($linha['horaRetirada']); ?></td>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td colspan="7">Nenhum registro encontrado.</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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