var Mobiledrs =  Mobiledrs || {};

Mobiledrs.MileageCalc = (function() {
	var qtyEl = $('#mileageQty');

	var amount = {
		input: $('#mileageAmount'),
		output: $('#mileageAmountOutput')
	};	

	var total = {
		input: $('#mileageTotal'),
		output: $('#mileageTotalOutput')
	};

	var grantTotal = {
		input: $('#grandTotal'),
		output: $('.total-amount'),
		default: Number($('#grandTotal').val())
	};

	var init = function() {
		qtyEl.on('blur', function() {
			compute($(this).val());
		});

		compute(qtyEl.val());
	};

	var compute = function(val) {
		let value = parseInt(val);

		if (isNaN(value)) {
			value = 0;
		}

		if (value < 0) {
			alert("Qty should not be less than zero.");
		}

		let newAmount = value * Number(amount.input.val());
		let grandTotal = grantTotal.default + newAmount;

		total.input.val(newAmount.toFixed(2));
		grantTotal.input.val(grandTotal);

		total.output.html(newAmount.toFixed(2));
		grantTotal.output.html(grandTotal.toLocaleString(undefined, {minimumFractionDigits: 2}));
	};

	return {
		init: init
	};
})();

Mobiledrs.MileageCalc.init();