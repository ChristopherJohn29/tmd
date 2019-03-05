var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Month_day_incrementor = (function() {
	var monthDay = $('[data-month-day-incrementor]');
	var monthEl = $('[name="month"]');
	var yearEl = $('[name="year"]');

	var init = function() {
		monthEl.on('change', function() {
			var date = new Date(
				yearEl.val(), 
				monthEl.val(), 
				0
			);

			var lastMonthDay = parseInt(date.getDate());

			monthDay.html('');

			for (var i = 1; i < lastMonthDay + 1; i++) {
				monthDay.append('<option>' + i + '</option>');
			}
		});

		monthEl.trigger('change');
	};

	return {
		init: init
	};
})();

Mobiledrs.Month_day_incrementor.init();