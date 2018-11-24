<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "home.php":
			$CURRENT_PAGE = "Home"; 
			$PAGE_TITLE = "Home";
			break;
		case "patients.php":
			$CURRENT_PAGE = "Patients"; 
			$PAGE_TITLE = "Patients";
			break;
		case "/php-template/add-patients.php":
			$CURRENT_PAGE = "Add Patients"; 
			$PAGE_TITLE = "Add Patients";
			break;
		case "/php-template/search-patient.php":
			$CURRENT_PAGE = "Search Patient"; 
			$PAGE_TITLE = "Search Patient";
			break;
		case "/php-template/providers.php":
			$CURRENT_PAGE = "Providers"; 
			$PAGE_TITLE = "Providers";
			break;
		case "/php-template/add-provider.php":
			$CURRENT_PAGE = "Add Provider"; 
			$PAGE_TITLE = "Add Provider";
			break;
		case "/php-template/route-sheet.php":
			$CURRENT_PAGE = "Route Sheet"; 
			$PAGE_TITLE = "Route Sheet";
			break;
		case "/php-template/create-route-sheet.php":
			$CURRENT_PAGE = "Create Route Sheet"; 
			$PAGE_TITLE = "Create Route Sheet";
			break;
		case "/php-template/home-health-care.php":
			$CURRENT_PAGE = "Home Health Care"; 
			$PAGE_TITLE = "Home Health Care";
			break;
		case "/php-template/add-home-health-care.php":
			$CURRENT_PAGE = "Add Home Health Care"; 
			$PAGE_TITLE = "Add Home Health Care";
			break;
		case "/php-template/payroll.php":
			$CURRENT_PAGE = "Payroll"; 
			$PAGE_TITLE = "Payroll";
			break;
		case "/php-template/search-payroll.php":
			$CURRENT_PAGE = "Search Payroll"; 
			$PAGE_TITLE = "Search Payroll";
			break;
		case "/php-template/aw-superbill.php":
			$CURRENT_PAGE = "AW Superbill"; 
			$PAGE_TITLE = "AW Superbill";
			break;
		case "/php-template/home-visits-superbill.php":
			$CURRENT_PAGE = "Home Visits Superbill"; 
			$PAGE_TITLE = "Home Visits Superbill";
			break;
		case "/php-template/facility-visits-superbill.php":
			$CURRENT_PAGE = "Facility Visits Superbill"; 
			$PAGE_TITLE = "Facility Visits Superbill";
			break;
		case "/php-template/cp0-485-superbill.php":
			$CURRENT_PAGE = "CP0-485 Superbill"; 
			$PAGE_TITLE = "CP0-485 Superbill";
			break;
		default:
			$CURRENT_PAGE = "Home";
			$PAGE_TITLE = "Welcome!";
	}
?>