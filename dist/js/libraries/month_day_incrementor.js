var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Month_day_incrementor = (function() {

	var monthFromDay = $('[data-month-day-incrementor][name="fromDate"]');
	var monthToDay = $('[data-month-day-incrementor][name="toDate"]');

	var monthFromEl = $('[name="month"]');
	var monthToEl = $('[name="tomonth"]');

	var yearEl = $('[name="year"]');

	var init = function() {
		monthFromEl.on('change', function() {
			var date = new Date(
				yearEl.val(), 
				monthFromEl.val(), 
				0
			);

			var lastMonthDay = parseInt(date.getDate());

			monthFromDay.html('');

			for (var i = 1; i < lastMonthDay + 1; i++) {
				monthFromDay.append('<option>' + i + '</option>');
			}
		});

		monthToEl.on('change', function() {
			var date = new Date(
				yearEl.val(), 
				monthToEl.val(), 
				0
			);

			var lastMonthDay = parseInt(date.getDate());

			monthToDay.html('');

			for (var i = 1; i < lastMonthDay + 1; i++) {
				monthToDay.append('<option>' + i + '</option>');
			}
		});

		monthFromEl.trigger('change');
		monthToEl.trigger('change');
	};

	return {
		init: init
	};
})();

Mobiledrs.Month_day_incrementor.init();