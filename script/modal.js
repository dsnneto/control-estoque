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


