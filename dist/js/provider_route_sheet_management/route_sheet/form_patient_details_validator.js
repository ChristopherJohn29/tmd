var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Routesheet_form_patient_details_validator =  (function() {

	var init = function () {			
		patientsName();
	};

	var patientsName = function() {
		var patientsNameList = [];

		$('[data-mobiledrs_autosuggest]').on('blur', function() {
			var value = $(this).prev().val();

			if (value == '')
			{
				return false;
			}

			if (patientsNameList.includes(value))
			{
				alert('Duplication of Patient Name is not allowed.');

				$(this).val('');

				return false;
			}

			patientsNameList.push(value);
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form_patient_details_validator.init();