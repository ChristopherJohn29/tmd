 $(function () {
    $('#all-patient-list').DataTable({
      	'paging'      : true,
        "pageLength": 100,
      	'info'        : true,
        "order": [[ 1, 'desc' ]]
        'dom': "<'row'<'col-sm-12'<\".toolbar\">>>",
        initComplete: function(){
          var url = window.location.href  + '/add';
          var button = $('<a href="#"><span class="label label-primary">Add</span></a>');
          
          button.attr('href', url);

          $("div.toolbar").append(button);      
        },
  		  "columnDefs": [
  	    	{ "orderable": false, "targets": 0 },
  	    	{ "orderable": true, "targets": 1 },
  	    	{ "orderable": false, "targets": 2 },
  	    	{ "orderable": true, "targets": 3 },
  	    	{ "orderable": true, "targets": 4 },
  	    	{ "orderable": false, "targets": 5 }
		    ]
    })
  })