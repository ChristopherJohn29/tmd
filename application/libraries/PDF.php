<?php

require_once('TCPDF/tcpdf.php');

class PDF {

	private $pdf = null;

	public $page_orientation = PDF_PAGE_ORIENTATION;

	private function prepare(string $html) 
	{
		// create new PDF document
		$this->pdf = new TCPDF($this->page_orientation, 'pt', PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set margins
		$this->pdf->SetMargins(36, 36, 36);

		$this->pdf->setPrintHeader(false);
		$this->pdf->setPrintFooter(false);

		// add a page
		$this->pdf->AddPage();

		// output the HTML content
		$this->pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$this->pdf->lastPage();
	}

	public function generate(string $html, string $filename)
	{
		$this->prepare($html);

		//Close and output PDF document
		$this->pdf->Output($filename . '.pdf', 'D');
	}

	public function generate_as_attachement(string $html, string $filename)
	{
		$this->prepare($html);

		//Close and output PDF document
		$this->pdf->Output($filename . '.pdf', 'F');
	}
}