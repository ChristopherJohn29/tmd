var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Year_incrementor = (function() {
	var defaultYear = 2018;
	var yearEl = $('[name="year"]');

	var init = function() {
		var currentDate = new Date();
		var diffYear = currentDate.getFullYear() - defaultYear;
		var yearList = ['<option>2018</option>'];

		for (var i = 0; i < diffYear; i++) {
			var year = (i < 1) ? defaultYear : parseInt($(yearList[i]).html());

			yearList.push('<option>' + (year + 1) + '</option>');
		}

		yearEl.append(yearList);
	};

	return {
		init: init
	};
})();

Mobiledrs.Year_incrementor.init();