<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/modal.css">
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
                            <div class="button-group">
                                <button type="button" class="btn btn-outline-danger">Retirar Produto</button>
                                <button type="button" class="btn btn-outline-secondary">Adicionar Produto</button>
                            </div>
                            <!-- Estrutura do Modal -->
                                <div id="myModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <form action="./cadastrobd.php" method="post">
                                        <h1>ADICIONAR ITEM</h1>
                                            <div class="row">
                                            <div class="col">
                                                <label for="nome">
                                                    <span>NOME ITEM</span>
                                                    <input type="text" name="nome" id="nome" placeholder="Nome do novo produto" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="quantidade">
                                                        <span>QTD ATUAL</span>
                                                        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade atual" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="minimo">
                                                        <span>QTD MIN</span>
                                                        <input type="text" name="minimo" id="minimo" placeholder="Quantidade mínima" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="arm">
                                                        <span>LOCAL</span>
                                                        <input type="text" name="arm" id="arm" placeholder="Box - armário - estante" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit">SALVAR</button>
                                                    <button type="button" class="close-modal">CANCELAR</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        
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
                                        require_once("./estoquebd.php");
                                        if ($totalRegistros > 0) {
                                            foreach ($dados as $linha) {
                                    ?>
                                    <tr <?php if ($linha["quantidadeEstoque"] <= $linha["quantidademinimaEstoque"]) { echo 'class="qtdMin"'; } ?>>
                                        <td><?= htmlspecialchars($linha["nomeEstoque"]); ?></td>
                                        <td align="center"><?= htmlspecialchars($linha["quantidadeEstoque"]); ?></td>
                                        <td align="center"><?= htmlspecialchars($linha["armazenamento"]); ?></td>
                                        <td align="center">
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
                    <form id="editForm" action="./excluirbd.php" method="post">
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

                <!-- Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './layout/script.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModalElement = document.getElementById('myModal');
            var myModal = new bootstrap.Modal(myModalElement);

            myModalElement.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var nome = button.getAttribute('data-nome');
                var quantidade = button.getAttribute('data-quantidade');
                var armazenamento = button.getAttribute('data-armazenamento');
                var minimo = button.getAttribute('data-minimo');

                this.querySelector('#id').value = id;
                this.querySelector('#nItem').value = nome;
                this.querySelector('#quantidade').value = quantidade;
                this.querySelector('#armazenamento').value = armazenamento;
                this.querySelector('#minimo').value = minimo;
            });

            document.getElementById('deleteBtn').addEventListener('click', function (e) {
                e.preventDefault();
                if (confirm('Tem certeza de que deseja excluir este produto?')) {
                    var id = document.getElementById('id').value;

                    fetch('./excluir.php?id=' + id, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            myModal.hide(); // Fechar o modal
                            location.reload(); // Opcional: recarregar a página
                        } else {
                            alert('Erro ao excluir o produto. Tente novamente.');
                        }
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });
                }
            });
        });


                    // modal
                 modal
            var modal = document.getElementById("myModal");

            var btn = document.querySelector(".btn-outline-secondary");

            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function() {
                modal.style.display = "block";
            }

            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            document.querySelector(".close-modal").onclick = function() {
                modal.style.display = "none";
            }
        
    </script>
</body>
</html>
