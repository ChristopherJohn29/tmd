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