var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Superbill_create = (function() {
	var defaultYear = '2018';
	var yearEl = $('[name="year"]');

	var init = function() {
		var currentDate = new Date();
		var diffYear = currentDate.getFullYear() - parseInt(defaultYear);


		console.log(diffYear);
	};

	return {
		init: init
	};
})();

Mobiledrs.Superbill_create.init();