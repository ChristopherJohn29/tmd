$(function () {
 	var oldStart = 0;

  $('#dflo-list').DataTable({
    	"searching": false,
     	"lengthChange": false,
      "pageLength": 100,
      "columnDefs": [
        { "orderable": true, "targets": 0 },
        { "orderable": true, "targets": 1 },
        { "orderable": false, "targets": 2 },
        { "orderable": true, "targets": 3 },
        { "orderable": false, "targets": 4 },
        { "orderable": false, "targets": 5 },
      ],
    	"fnDrawCallback": function (o) {
      	if ( o._iDisplayStart != oldStart ) {
        		var targetOffset = $('#dflo-list').offset().top;

          	$('html,body').scrollTop(targetOffset);            

          	oldStart = o._iDisplayStart;
      	}
    	}
  });
});