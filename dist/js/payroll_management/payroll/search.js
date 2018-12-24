var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Payroll_searchBar =  (function() {
	var fromDate = $('[name="fromDate"]');
	var toDate = $('[name="toDate"]');
	var firstCutOff = '1';

	var init = function () {
		fromDate.on('change', function() {
			var value = $(this).val();
			var options = toDate.find('option');
			
			options.removeAttr('selected');

			if (value == firstCutOff)
			{
				options.eq(0).attr('selected', true);
			}
			else
			{
				options.eq(1).attr('selected', true);
			}
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Payroll_searchBar.init();