var Mobiledrs = {} || Mobiledrs;

Mobiledrs.PT_trans_form = (function() {
	var noShow = 5;
	var cancelled = 6;
	var hRefused = 11;
	var pRefused = 12;

	var init = function() {
		typeVisitsEvnt();

		var currentVal = $('[name="pt_tovID"]').val();

		if (currentVal != '')
		{
			$('[name="pt_tovID"]').trigger('change');
		}
	};

	var typeVisitsEvnt = function() {
		$('[name="pt_tovID"]').on('change', function() {
			var value = $(this).val();
			var formContainerFields = $('.form-container').find('input, select');

			if (value == noShow || value == cancelled || value == hRefused || value == pRefused) 
			{
				formContainerFields.attr('disabled', true);

				// alert('test');
				
				$('[name="pt_dateOfService"]').removeAttr('disabled');
				$('[name="pt_tovID"]').removeAttr('disabled');
				$('[name="pt_notes"]').removeAttr('disabled');
				$('[name="pt_dateRef"]').removeAttr('disabled');
				$('[name="pt_dateRefEmailed"]').removeAttr('disabled');

				if (value == noShow)
				{
					$('[name="pt_mileage"]').removeAttr('disabled');
				}

				if (value == hRefused || value == pRefused)
				{
					label = $('[name="pt_dateOfService"]').parent();
					label.find('label').text('Date Refused');
				} else {
					label = $('[name="pt_dateOfService"]').parent();
					label.find('label').text('Date of Service');
				}

				

				if (value == noShow || value == cancelled)
				{
					$('[name="patient_hhcID"]').removeAttr('disabled');
					$('[data-mobiledrs_autosuggest]').removeAttr('disabled');
					$('[name="pt_providerID"]').removeAttr('disabled');
				}

				

			}
			else 
			{
				formContainerFields.not('#p_refused').not('#hh_refused').removeAttr('disabled');

				$('[name="pt_notes"]').val('');
				$('[name="pt_notes"]').attr('disabled', true);
			}

			$(this).val(value);
		});

		if(jQuery('#is_early_discharge').length){
			jQuery('#is_early_discharge').on('click', function (){
				if(jQuery('#is_early_discharge').is(":checked")){
					jQuery('#early_discharge_date').attr('required','true');
				} else {
					jQuery('#early_discharge_date').removeAttr('required');
				}
			});
		}
	};

	return {
		init: init
	};
})();

Mobiledrs.PT_trans_form.init();