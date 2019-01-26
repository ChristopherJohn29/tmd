<?php

class Date_formatter {
	private $fromDateMonth = null;
	private $fromDateDay = null;
	private $fromDateYear = null;
	private $toDateMonth = null;
	private $toDateDay = null;
	private $toDateYear = null;
	private $dateFormat = '';

	public function set_date(string $fromDate = '', string $toDate = '') {
		if (!empty($fromDate)) {
			$fromDate = new DateTime($fromDate);

			$this->fromDateMonth = $fromDate->format('F');
			$this->fromDateDay = $fromDate->format('j');
			$this->fromDateYear = $fromDate->format('Y');
		}

		if (!empty($toDate)) {
			$toDate = new DateTime($toDate);

			$this->toDateMonth = $toDate->format('F');
			$this->toDateDay = $toDate->format('j');
			$this->toDateYear = $toDate->format('Y');
		}
	}

	public function format() : string {
		if (($this->toDateMonth == $this->fromDateMonth) && 
			($this->fromDateYear == $this->toDateYear)) {

			$this->dateFormat = $this->fromDateMonth . ' ';
			$this->dateFormat .= $this->fromDateDay . ' - ';
			$this->dateFormat .= $this->toDateDay . ', ';
			$this->dateFormat .= $this->fromDateYear;
		} else if (!isset($this->toDateMonth)) {
			$this->dateFormat = $this->fromDateMonth . ' ';
			$this->dateFormat .= $this->fromDateDay . ', ';
			$this->dateFormat .= $this->fromDateYear;
		} else if (($this->toDateMonth != $this->fromDateMonth) && 
			($this->fromDateYear == $this->toDateYear)) {

			$this->dateFormat = $this->fromDateMonth . ' ';
			$this->dateFormat .= $this->fromDateDay . ' - ';
			$this->dateFormat .= $this->toDateMonth . ' ';
			$this->dateFormat .= $this->toDateDay . ', ';
			$this->dateFormat .= $this->fromDateYear;
		} else if (($this->fromDateYear != $this->toDateYear)) {

			$this->dateFormat = $this->fromDateMonth . ' ';
			$this->dateFormat .= $this->fromDateDay . ', ';
			$this->dateFormat .= $this->fromDateYear . ' - ';
			$this->dateFormat .= $this->toDateMonth . ' ';
			$this->dateFormat .= $this->toDateDay . ', ';
			$this->dateFormat .= $this->toDateYear;
		}

		return $this->dateFormat;
	}
}