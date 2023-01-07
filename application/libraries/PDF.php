<?php

require_once('TCPDF/tcpdf.php');

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = K_PATH_IMAGES.'image_demo.jpg';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

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

	public function generate_hv(string $html, string $filename)
	{
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle('Home visit request form');

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(2, 40, 0, 0);
		$pdf->SetHeaderMargin(0);
		$pdf->SetFooterMargin(0);

		// remove default footer
		$pdf->setPrintFooter(false);

		// set auto page breaks
		$pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('josefinsans', '', 48);

		// --- example with background set on page ---

		// remove default header
		$pdf->setPrintHeader(false);

		// add a page
		$pdf->AddPage();

		// -- set new background ---

		// get the current page break margin
		$bMargin = $pdf->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = K_PATH_IMAGES.'tmd_pdf.png';
		$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();


		// Print a text
		$pdf->writeHTML($html, true, false, true, false, '');

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output($filename . '.pdf', 'F');
	}

	private function prepare_hv(string $html) 
	{
		// create new PDF document
		$this->pdf = new TCPDF($this->page_orientation, 'pt', PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set margins
		$this->pdf->SetMargins(0, 0, 0);

		$this->pdf->setPrintHeader(false);
		$this->pdf->setPrintFooter(false);

		// add a page
		$this->pdf->AddPage();

		// output the HTML content
		$this->pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$this->pdf->lastPage();
	}
}