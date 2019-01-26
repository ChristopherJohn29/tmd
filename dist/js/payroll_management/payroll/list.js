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
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  };

  return {
    init: init
  };
})();

Mobiledrs.Payroll_list.init();