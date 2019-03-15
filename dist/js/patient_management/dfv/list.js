$(function () {
 	var oldStart = 0;

  $('#dfv-list').DataTable({
    	"searching": false,
     	"lengthChange": false,
      "pageLength": 100,
      "columnDefs": [
        { "orderable": false, "targets": 0 },
        { "orderable": true, "targets": 1 },
        { "orderable": true, "targets": 2 },
        { "orderable": false, "targets": 3 },
        { "orderable": false, "targets": 4 },
        { "orderable": false, "targets": 5 }
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