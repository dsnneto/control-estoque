<?php
// HTML HEAD
$title = 'SCE | Departamentos';
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
            <h1>Departamentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Departamentos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- ADD DEPARTMENTS -->
        <div class="conteudo-departamentos">
          
          <div class="card card-primary" style="max-width: 30%;">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body" id="add-departamento-input">
                <div class="form-departamentos">
                  <input type="text" placeholder="Ex.: Financeiro, Almoxarifado...">
                </div>
              </div>
              <!-- /.card-body -->
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          
          <div class="col-12">
            <div class="card" style="max-width: 40%;">
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
                      <th>#</th>
                      <th>Departamentos</th>
                      <th>Ações</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <!--<td text align="center"><?= $linha["IDEstoque"]; ?></td>-->
                    <td text align="center"></td>
                    <td text align="center"><a href="./editar.php?id=<?= $linha['IDEstoque']; ?>">
                      EDITAR
                    </a></td>
                    <td text align="center" ><a href="./excluir.php?id=<?= $linha['IDEstoque']; ?>">X</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /. departamentos conteudo -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    
    
    
    
    
    
<?php require_once './layout/script.php'; ?>