var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Routesheet_form_patient_details_validator =  (function() {

	var init = function () {			
		timeVisit();
	};

	var timeVisit = function() {
		var timeVisitList = [];

		$('[name="prsl_time[]"]').on('blur', function() {
			var value = $(this).val().trim().toLowerCase().replace(' ', '');

			if (timeVisitList.includes(value))
			{
				alert('Duplication of Time of visit is not allowed.');

				$(this).val('');

				return false;
			}

			timeVisitList.push(value);
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form_patient_details_validator.init();