//scritps sobre modal

$('#modalAdicionar').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var nome = button.data('nome');
    var modal = $(this);
    modal.find('#produtoAdicionar').val(nome);
    modal.find('#idProdutoAdicionar').val(id);
});

$('#modalEditar').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var nome = button.data('nome');
    var quantidade = button.data('quantidade');
    var modal = $(this);
    modal.find('#produtoEditar').val(nome);
    modal.find('#quantidadeEditar').val(quantidade);
    modal.find('#idProdutoEditar').val(id);
});



//scrips add departamentos
$(document).ready(function() {
    $('#form-add-departamento').on('submit', function(event) {
        event.preventDefault();

        var nomeDep = $('#departamento-nome').val();

        if (nomeDep) {
            $.ajax({
                url: 'departamentos.php', // Caminho para o script PHP
                type: 'POST',
                data: { nomeDep: nomeDep },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Adiciona uma nova linha na tabela com o novo departamento
                        $('#departamentos-tabela').append(
                            '<tr>' +
                                '<td style="text-align: center;">' + response.IDDepartamento + '</td>' +
                                '<td>' + response.nomeDep + '</td>' +
                            '</tr>'
                        );
                        // Limpa o campo de entrada
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



  
$(document).on('click', '[data-target="#modalRetirar"]', function () {
    const idEstoque = $(this).data('id');
    const nome = $(this).data('nome');
    const quantidade = $(this).data('quantidade');
    const armazenamentoNome = $(this).data('armazenamento');
    const departamentoNome = $(this).data('departamento');
    const armazenamentoID = $(this).data('armazenamento-id');
    const departamentoID = $(this).data('departamento-id');

    // Atualize os campos do modal com os dados
    $('#modalRetirar #idEstoque').val(idEstoque);
    $('#modalRetirar #nomeProduto').val(nome);
    $('#modalRetirar #quantidadeEstoque').val(quantidade);
    $('#modalRetirar #armazenamentoNome').val(armazenamentoNome);
    $('#modalRetirar #departamentoNome').val(departamentoNome);
    $('#modalRetirar #armazenamentoID').val(armazenamentoID);
    $('#modalRetirar #departamentoID').val(departamentoID);
});

$(document).on('click', '[data-target="#modalRepor"]', function () {
    const idEstoque = $(this).data('id');
    const nome = $(this).data('nome');
    const quantidade = $(this).data('quantidade');
    const armazenamentoNome = $(this).data('armazenamento');
    const departamentoNome = $(this).data('departamento');
    const armazenamentoID = $(this).data('armazenamento-id');
    const departamentoID = $(this).data('departamento-id');

    // Atualize os campos do modal com os dados
    $('#modalRepor #idProduto').val(idEstoque);
    $('#modalRepor #nomeProd').val(nome);
    $('#modalRepor #qtdEstoque').val(quantidade);
    $('#modalRepor #nomeArmazenamento').val(armazenamentoNome);
    $('#modalRepor #nomeDepartamento').val(departamentoNome);
    $('#modalRepor #armazenamento-ID').val(armazenamentoID);
    $('#modalRepor #departamento-ID').val(departamentoID);
});
  

  


