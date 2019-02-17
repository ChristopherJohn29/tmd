  $(function () {
    var oldStart = 0;
    
    $('#all-patient-list').DataTable({
      dom: "<'row'<'col-sm-3'<\"#total\">><'col-sm-6'<\".toolbar\">><'col-sm-3'f>>tp",
      initComplete: function(){
        var url = window.location.href  + '/add';
        var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
        
        button.attr('href', url);

        $("div.toolbar").append(button);      
      },
      "pageLength": 50,
      "fnDrawCallback": function (o) {
        if ( o._iDisplayStart != oldStart ) {
          var targetOffset = $('table').offset().top;

          $('html,body').scrollTop(targetOffset);            

          oldStart = o._iDisplayStart;
        }
      }
    });

    var totalVal = '<p style="font-size: 1.5em;"><strong>Total: </strong>' + ($('[name="total"]').val()) + '</p>';
    $('#total').html(totalVal);
  });