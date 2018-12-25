var Mobiledrs = {} || Mobiledrs;

Mobiledrs.PT_trans_form = (function() {
	var noShow = 5;
	var cancelled = 6;

	var otherRequiredFields = '[name="pt_performed"], ';
	otherRequiredFields += '[name="pt_acp"], ';
	otherRequiredFields += '[name="pt_diabetes"], ';
	otherRequiredFields += '[name="pt_tobacco"], ';
	otherRequiredFields += '[name="pt_tcm"], ';
	otherRequiredFields += '[name="pt_icd10_codes"], ';
	otherRequiredFields += '[name="pt_dateRefEmailed"]';

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

			if (value == noShow || value == cancelled)
			{
				formContainerFields.attr('disabled', true);

				$('[name="pt_providerID"]').removeAttr('disabled');
				$('[data-mobiledrs_autosuggest]').removeAttr('disabled');
				$('[name="pt_dateOfService"]').removeAttr('disabled');
				$('[name="pt_tovID"]').removeAttr('disabled');
				$('[name="pt_notes"]').removeAttr('disabled');

				$(otherRequiredFields).removeAttr('required');
			}
			else 
			{
				formContainerFields.removeAttr('disabled');

				$('[name="pt_notes"]').attr('disabled', true);

				$(otherRequiredFields).attr('required', true);
			}

			$(this).val(value);
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.PT_trans_form.init();