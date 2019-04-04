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
		var tovDropDwnEl = $(el).closest('.patient-details-item')
			.find('[name="prsl_tovID[]"]');
		var tovElCont = tovDropDwnEl.parent();
		var patientTovUrl = tovDropDwnEl.attr('data-tov_url');
		var tovIDSel = tovElCont.find('[name="prsl_tovIDSel"]').val();
		var patientTransID = tovElCont.find('#prsl_patientID').val();

		if (patientID == '') {
			return false;
		}

		$.ajax({
			method: 'GET',
			url: window.location.origin + patientTovUrl,
			data: '&patientID='+patientID + '&patientTransID=' + patientTransID,
			success: function(data) {
				tovDropDwnEl.html(data);
				tovDropDwnEl.find('[value="' + tovIDSel + '"]').attr('selected', 'true');
			}
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form_patient_details_edit.init();