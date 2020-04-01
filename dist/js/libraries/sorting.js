 $(function () {
    $('[data-sortBtn]').on('click', function(e) {
        e.preventDefault();

        var tableHeader = $('[data-sortTable] thead th[aria-sort]');
        var tableColumnID =  tableHeader.attr('data-columnid');
        var sortDirection = tableHeader.attr('aria-sort');
        var url = $(this).attr('href');

        if (tableColumnID) {
            window.open(window.location.origin+url+'/'+tableColumnID+'/'+sortDirection);   
        } else {
            window.open(window.location.href = window.location.origin+url);
        }
    });
  });