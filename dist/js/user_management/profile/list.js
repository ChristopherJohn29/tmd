$(function () {
	var oldStart = 0;
	
	$('#all-patient-list').DataTable({
	  'paging'      : false,
	  'lengthChange': false,
	  'searching'   : false,
	  'ordering'    : false,
	  'info'        : false,
	  'autoWidth'   : false,
      "fnDrawCallback": function (o) {
        if ( o._iDisplayStart != oldStart ) {
          var targetOffset = $('table').offset().top;

          $('html,body').scrollTop(targetOffset);            

          oldStart = o._iDisplayStart;
        }
      }
	});
});