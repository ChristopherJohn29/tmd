var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Main =  (function() {
	var init = function () {
		paid_btn();

		delete_btn();

		autosuggest();

		inputMask();

		timePicker();
	};

	var paid_btn = function() {
		$('[data-paid-btn]').on('click', function(e) {
			e.preventDefault();

			var action_url = $(this).attr('href');

			if (confirm('Are you sure you want to mark this data as paid?'))
			{
				$.ajax({
					"method": "POST",
					"url": action_url,
					"success": function(data) {
						var result = JSON.parse(data);

						if (result.state) 
						{
							alert(result.msg);

							window.location.href = window.location.href;
						}
						else 
						{
							alert(result.msg);
						}
					}
				});
			}
		});
	};

	var delete_btn = function() {
		$('[data-delete-btn]').on('click', function(e) {
			e.preventDefault();

			var action_url = $(this).attr('href');

			if (confirm('Are you sure you want to delete this data?'))
			{
				$.ajax({
					"method": "POST",
					"url": action_url,
					"success": function(data) {
						var result = JSON.parse(data);

						if (result.state) 
						{
							alert(result.msg);

							window.location.href = window.location.href;
						}
						else 
						{
							alert(result.msg);
						}
					}
				});
			}
		});
	};

	var autosuggest = function() {
		var mobiledrs_autosuggest_list = $('.mobiledrs-autosuggest-select');

		$.each(mobiledrs_autosuggest_list, function(indeex, value) {
			var autosuggest_parent = $(value);

			var mobiledrs_autosuggest = autosuggest_parent.find('[data-mobiledrs_autosuggest]');
			var url = window.location.origin + mobiledrs_autosuggest.attr('data-mobiledrs_autosuggest_url');
			var dropdown = '#' + mobiledrs_autosuggest.attr('data-mobiledrs_autosuggest_dropdown_id');

			mobiledrs_autosuggest.autocomplete({
		      	source: url,
		      	minLength: 2,
		      	appendTo: dropdown,
		      	select: function( event, ui) {
					var input = $(event.target).prev();

		        	input.val(ui.item.id);
		      	},
		      	response: function( event, ui ) {
					if ( ! ui.content.length)
					{
						alert('No search results found.');

						$(event.target).val('');
					}
				},
				_renderItem: function( ul, item ) {
				    return $( "<li>" )
					    .attr("data-value", item.value )
					    .attr("data-id", item.id)
					    .append( item.label )
					    .appendTo( ul );
				}
		    });
		});
	};

	var inputMask = function() {
		var dataMasks = $('[data-mask]');

		if (dataMasks.length)
		{
			$('[data-mask]').inputmask();
		}
	};

	var timePicker = function() {
		var timePickers = $('[data-timepicker]');

		if (timePickers.length)
		{
			$('[data-timepicker]').timepicker({
				minuteStep: 30,
				defaultTime: '8:00 AM'
			});
		}
	};

	return {
		init: init,
		autosuggest: autosuggest,
		timePicker: timePicker,
		inputMask : inputMask
	};
})();

Mobiledrs.Main.init();