<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once './layout/head.php'; ?>
</head>
<body>
    <?php
        require_once './layout/navbar.php';
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
                                <h3 class="card-title">Produtos com estoque mínimo: prod1, prod2, prod3</h3>
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
                                        require_once("./estoquebd.php"); // Aqui você deve garantir que $dados e $totalRegistros estejam configurados corretamente
                                        if ($totalRegistros > 0) {
                                            foreach ($dados as $linha) {
                                    ?>
                                    <tr <?php if ($linha["quantidadeEstoque"] <= $linha["quantidademinimaEstoque"]) { echo 'class="qtdMin"'; } ?>>
                                        <td><?= htmlspecialchars($linha["nomeEstoque"]); ?></td>
                                        <td text align="center"><?= htmlspecialchars($linha["quantidadeEstoque"]); ?></td>
                                        <td text align="center"><?= htmlspecialchars($linha["armazenamento"]); ?></td>
                                        <td text align="center">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                                                data-id="<?= htmlspecialchars($linha['IDEstoque']); ?>"
                                                data-nome="<?= htmlspecialchars($linha['nomeEstoque']); ?>"
                                                data-quantidade="<?= htmlspecialchars($linha['quantidadeEstoque']); ?>"
                                                data-armazenamento="<?= htmlspecialchars($linha['armazenamento']); ?>"
                                                data-minimo="<?= htmlspecialchars($linha['quantidademinimaEstoque']); ?>"
                                            >EDIT</button>
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

    <!-- The Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Editar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="editForm" action="./editarbd.php" method="post">
                        <input type="hidden" id="id" name="id">

                        <div class="mb-3">
                            <label for="nItem" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nItem" name="nItem" placeholder="Digite o nome do item" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Digite a quantidade atual disponível" required>
                        </div>

                        <div class="mb-3">
                            <label for="minimo" class="form-label">Quantidade Mínima</label>
                            <input type="number" class="form-control" id="minimo" name="minimo" placeholder="Digite a quantidade mínima" required>
                        </div>

                        <div class="mb-3">
                            <label for="armazenamento" class="form-label">Armazenamento</label>
                            <input type="text" class="form-control" id="armazenamento" name="armazenamento" placeholder="Digite o armazenamento" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="#" id="deleteBtn" class="btn btn-danger">Excluir</a>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './layout/script.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = document.getElementById('myModal');
            myModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var nome = button.getAttribute('data-nome');
                var quantidade = button.getAttribute('data-quantidade');
                var armazenamento = button.getAttribute('data-armazenamento');
                var minimo = button.getAttribute('data-minimo');

                var modal = this;
                modal.querySelector('#id').value = id;
                modal.querySelector('#nItem').value = nome;
                modal.querySelector('#quantidade').value = quantidade;
                modal.querySelector('#armazenamento').value = armazenamento;
                modal.querySelector('#minimo').value = minimo;
            });

            document.getElementById('deleteBtn').addEventListener('click', function (e) {
                e.preventDefault();
                if (confirm('Tem certeza de que deseja excluir este produto?')) {
                    var id = document.getElementById('id').value;
                    window.location.href = './excluir.php?id=' + id;
                }
            });
        });
    </script>
</body>
</html>
