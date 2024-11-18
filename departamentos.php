<!-- HTML CODE -->
<?php
// HTML HEAD
$title = 'SCE | Departamentos';
require_once './layout/head.php';

// NAV HEADER
require_once './layout/navbar.php';

// SIDEBAR AND SIDEBAR MENU
require_once './layout/sidebar.php';




?>




<div class="content-wrapper">
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
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="conteudo-departamentos">
                <div class="departamentos-add">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Adicionar Departamento</h3>
                        </div>

                        <!-- Formulário de Adição -->
                        <form id="form-add-departamento">
                            <div class="card-body">
                                <div class="form-departamentos">
                                    <input type="text" id="departamento-nome" name="nomeDep" placeholder="Ex.: Financeiro, Almoxarifado..." required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-success">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                // Conexão com o banco de dados
                $host = 'localhost';
                $dbname = 'bdestoque';
                $user = 'root';
                $password = '';

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Erro de conexão: " . $e->getMessage());
                }

                // Consulta para selecionar todos os departamentos
                $stmt = $pdo->query("SELECT IDDepartamento, nomeDep FROM departamentos");
                $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="departamentos-lista">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><img src="./style/icon/dep.png"></h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">CODIGO</th>
                                            <th>Nome do Departamento</th>
                                        </tr>
                                    </thead>
                                    <tbody id="departamentos-tabela">
                                        <?php foreach ($departamentos as $linha): ?>
                                            <tr>
                                                <td style="text-align: center;"><?= htmlspecialchars($linha["IDDepartamento"]) ?></td>
                                                <td><?= htmlspecialchars($linha["nomeDep"]) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $('#form-add-departamento').on('submit', function(event) {
        event.preventDefault();

        var nomeDep = $('#departamento-nome').val();

        if (nomeDep) {
            $.ajax({
                url: './departamentosbd.php', // Altere para o caminho correto do seu arquivo PHP
                type: 'POST',
                data: { nomeDep: nomeDep },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#departamentos-tabela').append('<tr><td style="text-align: center;">' + response.IDDepartamento + '</td><td>' + response.nomeDep + '</td></tr>');
                        $('#departamento-nome').val('');
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {

                    alert('Erro ao processar o pedido. Verifique a conexão com o banco de dados.');
                }
            });
        } else {
            alert('Por favor, insira o nome do departamento.');
        }
    });
});
</script>
     