var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Routesheet_form_patient_details_edit = (function() {
	var init = function() {
		var autosugest = $('.patient-details-item').find('[data-mobiledrs_autosuggest]');

		for (var i = 0; i < autosugest.length; i++) {
			var item = $(autosugest[i]);

			getPatientVisitRecord(item);
		}
	};

	var getPatientVisitRecord = function(el) {
		var patientID = $(el).prev().val();
		var tovEl = $(el).closest('.patient-details-item')
			.find('[name="prsl_tovID[]"]');
		var patientTovUrl = tovEl.attr('data-tov_url');
		var tovIDSel = tovEl.prev().val();

		if (patientID == '') {
			return false;
		}

		$.ajax({
			method: 'GET',
			url: window.location.origin + patientTovUrl,
			data: '&patientID='+patientID,
			success: function(data) {
				tovEl.html(data);
				tovEl.find('[value="' + tovIDSel + '"]').attr('selected', 'true');
			}
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form_patient_details_edit.init();