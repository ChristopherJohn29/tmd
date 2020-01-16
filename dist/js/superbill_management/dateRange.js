var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Superbill_DateRange = (function() {
	var init = function() {
		monthDayIncrementor('fromDate-incrementor', 'fromMonth');
		monthDayIncrementor('toDate-incrementor', 'toMonth');
	};

	var monthDayIncrementor = function(monthDay, month) {
		var monthDay = $('[data-' + monthDay + ']');
		var monthEl = $('[name="' + month + '"]');
		var yearEl = $('[name="year"]');

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

Mobiledrs.Superbill_DateRange.init();

		