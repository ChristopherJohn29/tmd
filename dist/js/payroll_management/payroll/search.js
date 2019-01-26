var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Payroll_searchBar =  (function() {
	var monthSelector = '[name="month"]';
	var fromDateSelector = '[name="fromDate"]';
	var yearSelector = '[name="year"]';
	var month = $(monthSelector);
	var fromDate = $(fromDateSelector);
	var toDate = $('[name="toDate"]');
	var year = $(yearSelector);
	var firstCutOff = '1';

	var init = function () {
		var selectors = monthSelector + ', ' + 
			fromDateSelector + ', ' +
			yearSelector;

		$(selectors).on('change', function() {
			var fromDateVal = fromDate.val();
			var toDateVal = '';
			
			if (fromDateVal == firstCutOff)
			{
				toDateVal = '15';
			}
			else
			{
				var date = new Date(
					year.val(), 
					month.val(), 
					0
				);

				var toDateVal = date.getDate();
			}

			var option = '<option value="' + toDateVal + '" selected="true">';
			option += toDateVal + '</option>';

			toDate.val('');
			toDate.find('option').remove();
			toDate.append(option);
		});

		fromDate.trigger('change');
	};

	return {
		init: init
	};
})();

Mobiledrs.Payroll_searchBar.init();