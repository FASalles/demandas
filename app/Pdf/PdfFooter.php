<?php

namespace App\Pdf;

use TCPDF;

class PdfFooter extends TCPDF
{
    // Implemente o método Footer para personalizar o rodapé
    public function Footer()
    {
        // Defina o conteúdo do rodapé aqui
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Este é o rodapé de todas as páginas', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
