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

	$('[data-autosuggest-select]').on('keyup', function(e) {
		var minInputLength = 2;

		if ($(this).val().length >= minInputLength) 
		{
			$.ajax({
				url: window.location.origin + $(this).attr('data-action-url') + '/' + $(this).val(),
				method: "GET",
				success: function(data) {
					var result = JSON.parse(data);

					if (result.state)
					{
						for (var i = 0; i < result.data.length; i++) {
							var str = '<li>';
							str	+= '<a data-id="' + result.data[i].hhc_id + '">' + result.data[i].hhc_name + '</a>';
							str += '</li>';

							$('.dropdown-menu').html('');
							$('.dropdown-menu').css('display', 'block');
							$('.dropdown-menu').append(str);
						}
					}
				} 
			});
		}
	});
})();