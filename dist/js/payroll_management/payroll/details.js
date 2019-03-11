var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Payroll_details = (function() {

	var init = function() {
		others();
		checkToPaid();
	};

	var	others = function() {
		var hasFirstAdd = false;
		var defaultTotalAmount = $('[name="total"]').val();

		$('[name="others"]').on('change', function() {
			var others = $(this).val();
			var actionUrl = $(this).attr('data-action-url');
			var total = $('[name="total"]');
			var totalAmount = total.val();

			if (others == '')
			{
				return false;
			}

			if (parseInt(others) < 0)
			{
				alert('Negative numbers is only allowed.');

				return
			}

			if (isNaN(others))
			{
				alert('Numbers is only allowed.');

				return false;
			}

			if (hasFirstAdd)
			{
				totalAmount = defaultTotalAmount;
			}
			else
			{
				hasFirstAdd =  true;
			}

			$.ajax({
				method: 'GET',
				url: actionUrl,
				data: '&total=' + totalAmount + '&others=' + others,
				success: function(data) {
					var newTotal = JSON.parse(data);
					var moneySign = (parseInt(others) > 0) ? '$' : '';

					total.val(newTotal);

					$('.others-amount').html(moneySign + others);
					$('.total-amount').html(newTotal);
				}
			});
		});
	};

	var checkToPaid = function() {
		var checkBoxes = $('[name="pt_id[]"]');
		var paidBtn = $('#paidBtn');

		$('#checkAll').on('change', function() {
			var isChecked = $(this).prop('checked');

			if (isChecked) {
				checkBoxes.prop('checked', true);
				paidBtn.removeAttr('disabled');
			}
			else {
				checkBoxes.prop('checked', false);
				paidBtn.attr('disabled', true);
			}
		});

		checkBoxes.on('change', function() {
			var isChecked = $(this).prop('checked');

			if (isChecked) {
				paidBtn.removeAttr('disabled');
			}
			else {
				var unChecksNum = 0;

				$.each(checkBoxes, function(i, value) {
					if ($(value).prop('checked')) {
						unChecksNum += 1;
					}
				});

				if (unChecksNum == 0) {
					paidBtn.attr('disabled', true);
				}
			}
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Payroll_details.init();