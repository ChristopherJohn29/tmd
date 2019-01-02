  $(function () {
   $('#all-patient-list').DataTable({
      dom: "<'row'<'col-sm-9'<\".toolbar\">><'col-sm-3'f>>",
      initComplete: function(){
        var url = window.location.href  + 'add';
        var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
        
        button.attr('href', url);

        $("div.toolbar").append(button);      
      }
    });
  });