(function() {
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
})();

(function() {
	$('[data-mobiledrs-autosuggest-select]').on('keyup', function(e) {
		var minInputLength = 2;

		if ($(this).val().length >= minInputLength) 
		{
			$.ajax({
				url: window.location.origin + $(this).attr('data-action-url') + '/' + $(this).val(),
				method: "GET",
				success: function(data) {
					var result = JSON.parse(data);
					var str = null;
					var dropdownMenu = $('.dropdown-menu');
					var mobiledrsAutosuggest = $('[data-mobiledrs-autosuggest-select]');

					if (result.state)
					{
						for (var i = 0; i < result.data.length; i++) {
							str = '<li>';
							str	+= '<a data-id="' + result.data[i].id + '">' + result.data[i].text + '</a>';
							str += '</li>';

							// add event
							str = $(str);
							str.on('click', function(e) {
								e.preventDefault();

								var elemClicked = $(this).find('a');
								var id = elemClicked.attr('data-id');
								var text = elemClicked.html();

								mobiledrsAutosuggest.val(text);
								var targetInput = mobiledrsAutosuggest.attr('data-input-target-name');

								$('[name="' + targetInput +'"]').val(id);

								dropdownMenu.css('display', 'none');	
							});
						}
					}
					else 
					{
						str = '<li>';
						str	+= '<a>No Search Result</a>';
						str += '</li>';
					}

					dropdownMenu.html('');
					dropdownMenu.css('display', 'block');
					dropdownMenu.append(str);
				} 
			});
		}
	});

	// $('body').on('click', function() {
	// 	$('.dropdown-menu').css('display', 'none');
	// });
})();