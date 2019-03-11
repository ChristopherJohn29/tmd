var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Event_listener = (function() {
	var user_autologout_popup = $('#alert_user_autologout');

	var init = function() {
		window.setInterval(function() {
			$.ajax({
				method: 'GET',
				url: user_autologout_popup.attr('data-action-url'),
				success: function(data) {
					if (data)
					{
						user_autologout_popup.modal({
							backdrop: 'static',
							keyboard: false,
							show: true
						});

						user_autologout_popup_btn();
					}
				}
			});
		}, 5000);
	};

	var user_autologout_popup_btn = function() {
		$('[data-okay]').on('click', function() {
			// refresh the page to call the is_logged_in function
			location.reload(true);
		});
	};

	return {
		init: init
	};
})();

Mobiledrs.Event_listener.init();

		