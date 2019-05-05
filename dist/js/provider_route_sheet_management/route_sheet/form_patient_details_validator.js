var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Routesheet_form_patient_details_validator = (function() {
	var patientsNameList = {};

	var init = function () {
		patientDefaultList();
		patientsName();
		dateOfService();
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

	var dateOfService = function() {
		var dateOfServiceEl = $('[name="prs_dateOfService"]');
		var origDateVal = (origDateVal == null && dateOfServiceEl.val() != '') ? dateOfServiceEl.val() : null;

		dateOfServiceEl.on('change', function() {
			var dateOfService = $(this);
			var dateOfServiceVal = dateOfService.val().split('/');
			var dateOfServiceFormat = dateOfServiceVal[2] + '-' + 
				dateOfServiceVal[0] + '-' + dateOfServiceVal[1];
			var dateOfServiceDate = new Date(dateOfServiceFormat);
			var currentDateVal = $('[name="currentDate"]').val();
			var currentDate = new Date(currentDateVal);

			if (dateOfServiceDate < currentDate) {
				alert('Adding past the current date is not allowed.');

				dateOfService.val('');

				return;
			}

			var providerID = $('[name="prs_providerID"]').val();
			var providerName = $('[name="prs_providerID"]').next().val();

			if (dateOfService.val() == origDateVal) {
				return;
			}

			$.ajax({
				"method": 'get',
				"url": dateOfService.attr('data-ajaxUrl'),
				"data": '&providerID=' + providerID + '&dateOfService=' + dateOfService.val() + '&providerName=' + providerName,
				success: function(data) {
					var result = JSON.parse(data);
					if (result.state == true) {
						alert(result.msg);

						dateOfService.val('');

						return;
					}
				}				
			});
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form_patient_details_validator.init();