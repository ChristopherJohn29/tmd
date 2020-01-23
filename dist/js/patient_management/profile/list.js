$(function () {
  var oldStart = 0;

  $('#all-patient-list').DataTable({
    "order": [],
    "pageLength": 100,
    'dom': "<'row'<'col-sm-12'<\".toolbar\">>>tp",
    initComplete: function(){
      var url = window.location.href  + '/add';
      var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
      
      button.attr('href', url);

      $("div.toolbar").append(button);      
    },
	  "columnDefs": [
    	{ "orderable": false, "targets": 9 }
    ],
    "fnDrawCallback": function (o) {
      if ( o._iDisplayStart != oldStart ) {
        var targetOffset = $('table').offset().top;

        $('html,body').scrollTop(targetOffset);            

        oldStart = o._iDisplayStart;
      }
    }
  })
});