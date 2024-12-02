<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  require_once "./estoquebd.php";
                ?>
                <h3><?php echo $total_produtos; ?></h3>

                <p>Total de Itens</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="./estoque.php" class="small-box-footer">Mais informações<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $produtos_perto_de_acabar;?></h3>

                <p>Itens para repor</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-alert"></i>
              </div>
              <a href="./estoque.php" class="small-box-footer">Mais informações<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $produtos_acabados; ?></h3>

                <p>Itens abaixo do estoque</p>
              </div>
              <div class="icon">
                <i class="ion ion-alert-circled"></i>
              </div>
              <a href="./estoque.php" class="small-box-footer">Mais informações<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="dashboard-tables">
  <!-- TABELA 2 - Últimas Retiradas -->
<div class="table-saidas">
  <h2 id="table-dashboard-title">Últimas retiradas de Itens</h2>
  <table class="table table-striped table-bordered" id="table-dashboard">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Item</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Data de Retirada</th>
      </tr>
    </thead>
    <tbody>
      <!-- Aqui será preenchido com os dados das últimas 3 retiradas -->
      <?php
      require_once('./retiradaPbd.php'); // Inclui a conexão com o banco de dados

      // Inicia a consulta para pegar as últimas 3 retiradas
      if ($totalRegistros > 0) {
        foreach ($dados as $linha) {
      ?>
        <tr>
          <td><?= htmlspecialchars($linha['nomeProduto']); ?></td>
          <td><?= htmlspecialchars($linha['qtdRetirada']); ?></td>
          <td><?= htmlspecialchars($linha['dataRetirada']); ?></td>
        </tr>
      <?php
        }
      } else {
      ?>
        <tr>
          <td colspan="3" class="text-center">Nenhuma retirada registrada</td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
</div>
</section>
