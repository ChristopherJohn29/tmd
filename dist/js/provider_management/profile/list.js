  $(function () {
    var oldStart = 0;
    
    $('#all-patient-list').DataTable({
      dom: "<'row'<'col-sm-3'<\"#total\">><'col-sm-6'<\".toolbar\">><'col-sm-3'f>>tp",
      initComplete: function(){
        var url = window.location.href  + '/add';
        var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
        
        button.attr('href', url);

        $("#all-patient-list_wrapper div.toolbar").append(button);      
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

    jQuery('#inactive').click(function(){
        if(jQuery('#inactive-patient-list.dataTable').length){

        } else {

          setTimeout(function(){ 

              $('#inactive-patient-list').DataTable({
              dom: "<'row'<'col-sm-3'<\"#total2\">><'col-sm-6'<\".toolbar\">><'col-sm-3'f>>tp",
              initComplete: function(){
                var url = window.location.href  + '/add';
                var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
                
                button.attr('href', url);

                $("#inactive-patient-list_wrapper div.toolbar").append(button);    
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

                  var totalVal2 = '<p style="font-size: 1.5em;"><strong>Total: </strong>' + ($('[name="total2"]').val()) + '</p>';
    $('#total2').html(totalVal2);

        }, 500);
          

        }
    });

    jQuery('#supervising').click(function(){
        if(jQuery('#supervising-patient-list.dataTable').length){

        } else {

          setTimeout(function(){ 

              $('#supervising-patient-list').DataTable({
              dom: "<'row'<'col-sm-3'<\"#total3\">><'col-sm-6'<\".toolbar\">><'col-sm-3'f>>tp",
              initComplete: function(){
                var url = window.location.href  + '/add';
                var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
                
                button.attr('href', url);

                $("#supervising-patient-list_wrapper div.toolbar").append(button);    
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

                   var totalVal3 = '<p style="font-size: 1.5em;"><strong>Total: </strong>' + ($('[name="total3"]').val()) + '</p>';
    $('#total3').html(totalVal3);

        }, 500);
          

        }
    });

    

    

    var totalVal = '<p style="font-size: 1.5em;"><strong>Total: </strong>' + ($('[name="total"]').val()) + '</p>';
    $('#total').html(totalVal);
 

  });