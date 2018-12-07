var Mobiledrs = {} || Mobiledrs;

Mobiledrs.PT_trans_form = (function() {
	var noShow = 4;
	var cancelled = 5;

	var init = function() {
		typeVisitsEvnt();

		var currentVal = $('[name="pt_tovID"]').val();

		if (currentVal == noShow || currentVal == cancelled)
		{
			$('[name="pt_tovID"]').trigger('change');
		}
	};

	var typeVisitsEvnt = function() {
		$('[name="pt_tovID"]').on('change', function() {
			var value = $(this).val();

			if (value == noShow || value == cancelled)
			{
				$('input, select').attr('disabled', true);

				$('[name="pt_providerID"]').removeAttr('disabled');
				$('[data-mobiledrs-autosuggest-select]').removeAttr('disabled');
				$('[name="pt_dateOfService"]').removeAttr('disabled');
				$('[name="pt_tovID"]').removeAttr('disabled');
				$('[name="pt_patientID"]').removeAttr('disabled');
				$('[name="pt_id"]').removeAttr('disabled');
			}
			else 
			{
				$('input, select').removeAttr('disabled');			
			}

			$(this).val(value);
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.PT_trans_form.init();