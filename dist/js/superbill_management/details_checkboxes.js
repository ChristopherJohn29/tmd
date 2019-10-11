var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Superbill_details_checkboxes = (function() {
	var init = function() {
		checkBoxes();
	};

	var checkBoxes = function() {
		var checkBoxes = $('.superbill_checkboxes');
		var billedBtn = $('#billedBtn');
		var generatePDF = $('#generatePDF');

		$('#checkAll').on('change', function() {
			var isChecked = $(this).prop('checked');

			if (isChecked) {
				checkBoxes.prop('checked', true);
				billedBtn.removeAttr('disabled');
				generatePDF.removeAttr('disabled');
			}
			else {
				checkBoxes.prop('checked', false);
				billedBtn.attr('disabled', true);
				generatePDF.attr('disabled', true);
			}
		});

		checkBoxes.on('change', function() {
			var isChecked = $(this).prop('checked');

			if (isChecked) {
				billedBtn.removeAttr('disabled');
				generatePDF.removeAttr('disabled');
			}
			else {
				var unChecksNum = 0;

				$.each(checkBoxes, function(i, value) {
					if ($(value).prop('checked')) {
						unChecksNum += 1;
					}
				});

				if (unChecksNum === 0) {
					billedBtn.attr('disabled', true);
					generatePDF.attr('disabled', true);
				}
			}
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Superbill_details_checkboxes.init();