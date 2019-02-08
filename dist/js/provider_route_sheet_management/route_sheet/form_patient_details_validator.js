var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Routesheet_form_patient_details_validator = (function() {
	var patientsNameList = {};

	var init = function () {
		patientDefaultList();
		patientsName();
	};

	var patientDefaultList = function() {
		var attrName = 'data-mobiledrs_autosuggest_dropdown_id';
		var defaultList = $('[' + attrName + ']');

		for (var i = 0, ilen = defaultList.length; i < ilen; i++) {
			var item = $(defaultList[i]);
			var key = item.attr(attrName);
			var value = item.prev().val();

			patientsNameList[key] = value;
		}
	};

	var isPatientExist = function(key, value, list) {
		for (k in list) {
			if (list[k] == value && k != key) {
				return true;
			}
		}

		return false;
	};

	var patientsName = function() {
		$('.patient-details-container [data-mobiledrs_autosuggest]').on('blur', function() {
			var value = $(this).prev().val();
			var key = $(this).attr('data-mobiledrs_autosuggest_dropdown_id');

			if (value == '')
			{
				return false;
			}

			if (isPatientExist(key, value, patientsNameList))
			{
				alert('Duplication of Patient Name is not allowed.');

				$(this).val('');

				return false;
			}

			patientsNameList[key] = value;
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form_patient_details_validator.init();