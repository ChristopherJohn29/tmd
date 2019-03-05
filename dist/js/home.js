$(function () {
	$('#patient-list').DataTable({
	  'paging'      : false,
	  'lengthChange': true,
	  'searching'   : false,
	  'ordering'    : true,
	  'info'        : false,
	  'autoWidth'   : false
	});
})