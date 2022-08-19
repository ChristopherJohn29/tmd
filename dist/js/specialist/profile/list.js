$(function () {
 var table = $('#all-specialist-list').DataTable({
    dom: "<'row'<'col-sm-3'<\"#total\">><'col-sm-6'<\".toolbar\">><'col-sm-3'f>>tp",
    initComplete: function(){
      var url = window.location.href  + '/add';
      var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
      
      button.attr('href', url);

      $("div.toolbar").append(button);  
    },
    "pageLength": 100,
    "columns": [
        null,
        { "searchable": false },
        { "searchable": false },
        { "searchable": false },
        null,
        { "searchable": false },
        { "searchable": false },

      ],
    "search": {
        "search": $('#highlight').val()
      }
  });

 table
  .column( '0:visible' )
  .order( 'asc' )
  .draw();

  var totalVal = '<p style="font-size: 1.5em;"><strong>Total: </strong>' + ($('[name="total"]').val()) + '</p>';
  $('#total').html(totalVal);
});