 $(function () {
    $('#pdfGenerationBtn').on('click', function(e) {
        e.preventDefault();

        var tableHeader = $('#headcount-list thead th[aria-sort]');
        var tableColumnID =  tableHeader.attr('data-columnid');
        var sortDirection = tableHeader.attr('aria-sort');
        var url = $(this).attr('href');

        if (tableColumnID === '11') {
            window.location.href = window.location.origin+url;
        } else {
            window.location.href = window.location.origin+url+'/'+tableColumnID+'/'+sortDirection;    
        }
    });
  });