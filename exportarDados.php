<?php
require('./plugins/fpdf/fpdf.php'); // Certifique-se de que o FPDF está incluído
require_once('./retiradaPbd.php'); // Inclua o arquivo com os dados

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, mb_convert_encoding('Relatório de Movimentações', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, mb_convert_encoding('Página ', 'ISO-8859-1', 'UTF-8') . $this->PageNo(), 0, 0, 'C');
    }

    function TableHeader()
    {
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(40, 10, mb_convert_encoding('Item', 'ISO-8859-1', 'UTF-8'), 1);
        $this->Cell(40, 10, mb_convert_encoding('Departamento', 'ISO-8859-1', 'UTF-8'), 1);
        $this->Cell(30, 10, mb_convert_encoding('Quantidade', 'ISO-8859-1', 'UTF-8'), 1);
        $this->Cell(40, 10, mb_convert_encoding('Responsável', 'ISO-8859-1', 'UTF-8'), 1);
        $this->Cell(20, 10, mb_convert_encoding('Data', 'ISO-8859-1', 'UTF-8'), 1);
        $this->Cell(20, 10, mb_convert_encoding('Hora', 'ISO-8859-1', 'UTF-8'), 1);
        $this->Ln();
    }

    function TableRow($row)
    {
        $this->SetFont('Arial', '', 10);
        $this->Cell(40, 10, mb_convert_encoding($row['nomeProduto'], 'ISO-8859-1', 'UTF-8'), 0);
        $this->Cell(40, 10, mb_convert_encoding($row['nomeDepartamento'], 'ISO-8859-1', 'UTF-8'), 0);
        $this->Cell(30, 10, mb_convert_encoding($row['qtdRetirada'], 'ISO-8859-1', 'UTF-8'), 0);
        $this->Cell(40, 10, mb_convert_encoding($row['respRetirada'], 'ISO-8859-1', 'UTF-8'), 0);
        $this->Cell(20, 10, mb_convert_encoding($row['dataRetirada'], 'ISO-8859-1', 'UTF-8'), 0);
        $this->Cell(20, 10, mb_convert_encoding($row['horaRetirada'], 'ISO-8859-1', 'UTF-8'), 0);
        $this->Ln();
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->TableHeader();

if ($totalRegistros > 0) {
    foreach ($dados as $linha) {
        $pdf->TableRow([
            'nomeProduto' => htmlspecialchars($linha['nomeProduto']),
            'nomeDepartamento' => htmlspecialchars($linha['nomeDepartamento']),
            'qtdRetirada' => htmlspecialchars($linha['qtdRetirada']),
            'respRetirada' => htmlspecialchars($linha['respRetirada']),
            'dataRetirada' => htmlspecialchars($linha['dataRetirada']),
            'horaRetirada' => htmlspecialchars($linha['horaRetirada']),
        ]);
    }
} else {
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->Cell(0, 10, 'Nenhum registro encontrado', 1, 1, 'C');
}

$pdf->Output('D', 'relatorio_de_movi.pdf'); // Baixar o arquivo como PDF
exit;