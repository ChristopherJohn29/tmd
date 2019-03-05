 $(function () {
 	var oldStart = 0;

    $('#headcount-list').DataTable({
      	"searching": false,
       	"lengthChange": false,
        "pageLength": 100,
      	"fnDrawCallback": function (o) {
        	if ( o._iDisplayStart != oldStart ) {
          		var targetOffset = $('table').offset().top;

	          	$('html,body').scrollTop(targetOffset);            

	          	oldStart = o._iDisplayStart;
        	}
      	}
    });
  })