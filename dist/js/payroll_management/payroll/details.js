var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Payroll_details = (function() {

	var init = function() {
		others();
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

					$('.others-amount').html(others);
					$('.total-amount').html(newTotal);
				}
			});
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Payroll_details.init();