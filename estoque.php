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
                <h3 class="card-title">Produtos com estoque minimo: prod1, prod2, prod3</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Armazenamento</th>
                    <th>Editar</th>
                    

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
                    <td text align="center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">EDIT</button></td>
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



<body>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editar</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
        <?php

          $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
          require_once ("./editar-view.php");

        ?>
          <form action="./editarbd.php" method="post">
                  <h1>Editar item</h1>

                  <input name="id" id="id" value="<?=$linha['IDEstoque']?>">
                  <!--pega o id-->


      <div class="row">
        <div class="col">
          <label for="quantidade">NOME</label>
          <input type="text" value="<?=$linha['nomeEstoque']?>" name="nItem" id="nItem" placeholder="Digite o nome do item">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="quantidade">quantidade</label>
          <input type="number" value="<?=$linha['quantidadeEstoque']?>" name="quantidade" id="quantidade" placeholder="Digite a quantidade atual disponivel">
         </div>
       </div>

     <div class="row" style="opacity: 0;">
        <div class="col">
          <label for="minimo" >quantidade minima</label>
          <input type="number" value="<?=$linha['quantidademinimaEstoque']?>"name="minimo" id="minimo" placeholder="Digite a quantidade  minima de produtos">
        </div>
      </div>

    <div class="row">
      <div class="col">
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

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">fechar</button>
      </div>

    </div>
  </div>
</div>


</body>
</html>