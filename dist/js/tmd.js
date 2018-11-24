/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
 
$(function () {
    $('#patient-list').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
})
