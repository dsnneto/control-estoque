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
          <div class="departamentos-add">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Adicionar Departamento</h3>
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
                  <div class="button-container">
                    <button type="submit" class="btn btn-outline-success">Adicionar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- ./ departamentos add -->

          <!-- departamentos lista -->
          <div class="departamentos-lista">
            <div class="col-12">
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Adicionar Departamento</h3>
              </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    
                      <tr>
                        <th text align="center">#</th>
                        <th>Departamentos</th>
                        <th text align="center">Ações</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td text align="center">1</td>
                        <td text align="center">Financeiro</td>
                        <td text align="center">E | X</td>
                      </tr>
                      <tr>
                        <td text align="center">2</td>
                        <td text align="center">Almoxarifado</td>
                        <td text align="center">E | X</td>
                      </tr>
                      <tr>
                        <td text align="center">3</td>
                        <td text align="center">Administrativo</td>
                        <td text align="center">E | X</td>
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
        <!-- ./ departamentos lista -->
        </div>
        <!-- /. departamentos conteudo -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    
    
    
    
    
    
<?php require_once './layout/script.php'; ?>