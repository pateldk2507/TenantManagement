// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    columns: [
      { orderable: true },
      { orderable: false },
      { orderable: false },
      { orderable: false },
      { orderable: false },
      { orderable: false },
      { orderable: false },
    ],    
    buttons: {
      
      buttons: [
        // 'excel', 'pdf', 'print',
        { extend: 'excel', className: 'copyButton btn btn-success', exportOptions: {
          columns: [ 0, 1, 2, 3, 4,5 ]
      } },
        { extend: 'pdf', className: 'copyButton btn btn-secondary', exportOptions: {
          columns: [ 0, 1, 2, 3, 4,5 ]
      } },
        { extend: 'print', className: 'copyButton btn btn-danger', exportOptions: {
              columns: [ 0, 1, 2, 3, 4,5 ]
      } },
      'colvis'
      ]
  },
  dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'B>>" +
  "<'row'<'col-sm-12'tr>>" +
  "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",  
  
  });
});
