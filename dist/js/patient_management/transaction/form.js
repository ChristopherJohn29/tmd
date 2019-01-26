var Mobiledrs = {} || Mobiledrs;

Mobiledrs.PT_trans_form = (function() {
	var noShow = 5;
	var cancelled = 6;

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
				$('[name="pt_dateRef"]').removeAttr('disabled');
				$('[name="pt_dateRefEmailed"]').removeAttr('disabled');

				if (value == noShow)
				{
					$('[name="pt_mileage"]').removeAttr('disabled');
				}
			}
			else 
			{
				formContainerFields.removeAttr('disabled');

				$('[name="pt_notes"]').attr('disabled', true);
			}

			$(this).val(value);
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.PT_trans_form.init();