$(function () {	
	$('#logs').DataTable({
		serverSide: true,
    	ajax: window.location.origin+"/ajax/user_management/logs/index"
	});
});