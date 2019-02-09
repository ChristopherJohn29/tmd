var Mobiledrs =  Mobiledrs || {};

Mobiledrs.Payroll_list =  (function() {
  var init = function () {
    tableList();
  };

  var tableList = function() {
    $('#all-patient-list').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'info'        : true,
      'autoWidth'   : false,
      'order': [[0, "asc"]],
      "columnDefs": [
        { "orderable": false, "targets": 0 },
        { "orderable": false, "targets": 1},
        { "orderable": false, "targets": 2},
        { "orderable": false, "targets": 3}
      ]
    })
  };

  return {
    init: init
  };
})();

Mobiledrs.Payroll_list.init();