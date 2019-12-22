$(function () {	
	$('#certificationsTable').DataTable({
		"order": [[ 1, 'desc' ]],
		"columnDefs": [
	        { "orderable": false, "targets": 0 },
	        { "orderable": true, "targets": 1 },
	        { "orderable": false, "targets": 2 },
	        { "orderable": false, "targets": 3 },
	        { "orderable": false, "targets": 4 },
	        { "orderable": false, "targets": 5 },
	        { "orderable": false, "targets": 6 },
	        { "orderable": false, "targets": 7 },
	        { "orderable": false, "targets": 8 },
	        { "orderable": false, "targets": 9 },
	        { "orderable": false, "targets": 10 }
      	],
      	"paging": false,
      	"searching": false,
      	"info": false
	});
});