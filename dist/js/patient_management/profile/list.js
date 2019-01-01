 $(function () {
    $('#all-patient-list').DataTable({
      	'paging'      : true,
      	'lengthChange': true,
      	'searching'   : false,
      	'info'        : true,
      	'autoWidth'   : false,
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