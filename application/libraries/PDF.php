<?php

require_once('TCPDF/tcpdf.php');

class PDF {

	public function generate($html, $filename)
	{
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'pt', PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set margins
		$pdf->SetMargins(36, 36, 36);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// add a page
		$pdf->AddPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output($filename . '.pdf', 'D');
	}
}