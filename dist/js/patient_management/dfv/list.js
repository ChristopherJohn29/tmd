$(function () {
 	var oldStart = 0;

  $('#dfv-list').DataTable({
    	"searching": false,
     	"lengthChange": false,
      "pageLength": 100,
      "columnDefs": [
        { "orderable": false, "targets": 0 },
        { "orderable": false, "targets": 1 },
        { "orderable": false, "targets": 2 },
        { "orderable": true, "targets": 3 },
        { "orderable": false, "targets": 4 },
        { "orderable": false, "targets": 5 },
        { "orderable": false, "targets": 6 }
      ],
    	"fnDrawCallback": function (o) {
      	if ( o._iDisplayStart != oldStart ) {
        		var targetOffset = $('#dfv-list').offset().top;

          	$('html,body').scrollTop(targetOffset);            

          	oldStart = o._iDisplayStart;
      	}
    	}
  });
});