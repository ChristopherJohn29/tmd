var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Routesheet_form_patient_details_adder = (function() {
	var tpl = null;
	var patientCount = 0;

	var init = function () {
		tpl = $('.patient-details-container')
			.find('.patient-details-item')
			.eq(0)
			.clone(true);

		tpl.find('input, select, textarea')
			.val('');

		tpl.find('.lead')
			.append('<a class="removeItemBtn" href="#" style="float:right;clear:both;">Remove Item</a>');

		patientCount = $('.patient-details-container')
			.find('.patient-details-item').length;

		addPatient();

		removePatientItem($('.removeItemBtn'));

	    $( ".patient-details-container" ).sortable({
		  	items: "> .patient-details-item",
		  	update:  function() {
				$('.item-num').each(function(index, element) {
					$(element).html(index + 1);
				});
			}
		});

		$( ".patient-details-container" ).disableSelection();

		getPatientVisitRecord();
	};

	var addPatient = function() {
		$('#addPatientBtn').on('click', function() {
			patientCount += 1;

			var tmpTpl = tpl.clone(true);

			tmpTpl.find('.item-num')
				.html(patientCount);

			tmpTpl.attr('data-item-num', patientCount);

			var removeItemBtn = tmpTpl.find('.removeItemBtn');

			removePatientItem(tmpTpl.find('.removeItemBtn'));

			var autosuggest_input_2 = tmpTpl.find('.mobiledrs-autosuggest-select').find('[name="prsl_patientID_name[]"]');
			var autosuggest_input = tmpTpl.find('.mobiledrs-autosuggest-select').find('[name="patient_homehealth[]"]');

			var autosuggest_dropdown_id = autosuggest_input.attr('data-mobiledrs_autosuggest_dropdown_id');
			var autosuggest_dropdown_id_2 = autosuggest_input_2.attr('data-mobiledrs_autosuggest_dropdown_id');

			var new_autosuggest_dropdown_id = autosuggest_dropdown_id + '_' + patientCount;
			var new_autosuggest_dropdown_id_2 = autosuggest_dropdown_id_2 + '_' + patientCount;

			autosuggest_input.attr('data-mobiledrs_autosuggest_dropdown_id', new_autosuggest_dropdown_id);
			autosuggest_input_2.attr('data-mobiledrs_autosuggest_dropdown_id', new_autosuggest_dropdown_id_2);

			// autosuggest dropdown
			autosuggest_input.next().attr('id', new_autosuggest_dropdown_id);
			autosuggest_input_2.next().attr('id', new_autosuggest_dropdown_id_2);

			$(this).parent()
				.prev()
				.append(tmpTpl);
				

			Mobiledrs.Main.autosuggest();
			Mobiledrs.Main.timePicker();
			Mobiledrs.Main.inputMask();
			getPatientVisitRecord();
		});
	};

	var getPatientVisitRecord = function() {
		$('[name="prsl_patientID_name[]"]').on('change', function() {
			var patientID = $(this).closest('.patient-details-item')
			.find('[name="prsl_patientID[]"]').val();
			var tovDrpDwnEl = $(this).closest('.patient-details-item')
				.find('[name="prsl_tovID[]"]');

			var tovDrpDwnEl = $(this).closest('.patient-details-item')
			.find('[name="prsl_tovID[]"]');

			var patient_hhcID  = $(this).closest('.patient-details-item')
			.find('[name="patient_hhcID[]"]');

			var patient_homehealth = $(this).closest('.patient-details-item')
			.find('[name="patient_homehealth[]"]');

			var tovElCont = tovDrpDwnEl.parent();
			var patientTovUrl = tovDrpDwnEl.attr('data-tov_url');
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
					tovDrpDwnEl.html(data);
					tovDrpDwnEl.find('[value="' + tovIDSel + '"]').attr('selected', 'true');
				}
			});			

			$.ajax({
				method: 'GET',
				url: window.location.origin + '/ajax/patient_management/profile/get_hhc',
				data: '&patientID='+patientID,
				success: function(data) {

					response = JSON.parse(data);
					patient_hhcID.val(response.hhc_id);
					patient_homehealth.val(response.hhc_name);
					
				}
			});		



		});
	};

	var removePatientItem = function(el) {
		el.on('click', function(e) {
			e.preventDefault();

			var patientItemNum = $(this).closest('.patient-details-item')
				.attr('data-item-num');

			$(this).closest('.patient-details-container')
				.find('[data-item-num="' + patientItemNum + '"]')
				.remove();

			// reorder all patient title numbers except the first
			var patientItems = $('.patient-details-container')
				.find('[data-item-num]');

			if (patientItems)
			{
				$.each(patientItems, function(index, el) {
					var startingNum = 2;
					var num = index + startingNum;

					el = $(el);

					el.attr('data-item-num', num);

					el.find('.item-num').html(num);
				});
			}

			patientCount -= 1;
		});
	};
	
	return {
		init: init
	};
})();

Mobiledrs.Routesheet_form_patient_details_adder.init();