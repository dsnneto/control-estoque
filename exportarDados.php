<?php
require_once('./retiradaPbd.php');

header('Content-Type: text/pdf; charset=utf-8');
header('Content-Disposition: attachment; filename="produtos_retirados.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, ['Item', 'Departamento', 'Quantidade', 'Responsável', 'Data', 'Hora']);

if ($totalRegistros > 0) {
    foreach ($dados as $linha) {
        fputcsv($output, [
            htmlspecialchars($linha['nomeProduto']),
            htmlspecialchars($linha['nomeDepartamento']),
            htmlspecialchars($linha['qtdRetirada']),
            htmlspecialchars($linha['respRetirada']),
            htmlspecialchars($linha['dataRetirada']),
            htmlspecialchars($linha['horaRetirada']),
        ]);
    }
} else {
    fputcsv($output, ['Nenhum registro encontrado']);
}

fclose($output);
exit;
?>
