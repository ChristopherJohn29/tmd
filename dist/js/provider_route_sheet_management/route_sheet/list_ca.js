$(function () {
  var oldStart = 0;
  
  $('#all-routesheet-list').DataTable({
    dom: "<'row'<'col-sm-9'<\".toolbar\">><'col-sm-3'f>>tp",
    initComplete: function(){
      var url = window.location.href  + '/add';

      url = url.replace('/index', '');

      url = url.replace('/ca/add', '/add/ca');

      var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
      
      button.attr('href', url);

      $("div.toolbar").append(button);      
    },
    'order': [],
    "iDisplayLength": 100,
    "fnDrawCallback": function (o) {
      if ( o._iDisplayStart != oldStart ) {
        var targetOffset = $('table').offset().top;

        $('html,body').scrollTop(targetOffset);            

        oldStart = o._iDisplayStart;
      }
    }
  });

  jQuery('#home-visit-request').dataTable({
      "order": []
  });
});