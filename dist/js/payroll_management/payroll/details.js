var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Payroll_details = (function() {

	var init = function() {
		others();
	};

	var	others = function() {
		$('[name="others"]').on('change', function() {
			var others = $(this).val();
			var actionUrl = $(this).attr('data-action-url');
			var total = $('[name="total"]');

			if (others == '')
			{
				return false;
			}

			if (isNaN(others))
			{
				alert('Numbers is only allowed.');

				return false;
			}

			$.ajax({
				method: 'GET',
				url: actionUrl,
				data: '&total=' + total.val() + '&others=' + others,
				success: function(data) {
					var newTotal = JSON.parse(data);

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