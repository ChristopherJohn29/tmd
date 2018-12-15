var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Routesheet_form = (function() {
	var init = function () {
		addPatient();
	};

	var addPatient = function() {
		$('#addPatientBtn').on('click', function() {
			console.log('tests');
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form.init();