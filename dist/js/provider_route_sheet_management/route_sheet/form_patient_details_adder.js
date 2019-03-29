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

		getPatientVisitRecord($('.patient-details-item').find('[data-mobiledrs_autosuggest]'));

	    $( ".patient-details-container" ).sortable({
		  	items: "> .patient-details-item",
		  	update:  function() {
				$('.item-num').each(function(index, element) {
					$(element).html(index + 1);
				});
			}
		});

		$( ".patient-details-container" ).disableSelection();
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

			var autosuggest_input = tmpTpl.find('[data-mobiledrs_autosuggest]');
			var autosuggest_dropdown_id = autosuggest_input.attr('data-mobiledrs_autosuggest_dropdown_id');
			var new_autosuggest_dropdown_id = autosuggest_dropdown_id + '_' + patientCount;

			autosuggest_input.attr('data-mobiledrs_autosuggest_dropdown_id', new_autosuggest_dropdown_id);

			// autosuggest dropdown
			autosuggest_input.next().attr('id', new_autosuggest_dropdown_id);

			getPatientVisitRecord(autosuggest_input);

			$(this).parent()
				.prev()
				.append(tmpTpl);

			Mobiledrs.Main.autosuggest();
			Mobiledrs.Main.timePicker();
			Mobiledrs.Main.inputMask();
		});
	};

	var getPatientVisitRecord = function(el) {
		$(el).on('blur', function() {
			var patientID = $(this).prev().val();
			var tovEl = $(this).closest('.patient-details-item')
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