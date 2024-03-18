// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

$(document).ready(function() {
  $('#user_table').DataTable();
});

$(document).ready(function() {
  $('#shoes_table').DataTable();
});

$(document).ready(function() {
  $('#crocs_table').DataTable();
});

$(document).ready(function() {
  $('#slippers_table').DataTable();
});

$(document).ready(function() {
  $('#critical_table').DataTable();
});

$(document).ready(function() {
  $('#salesTable').DataTable({
    scrollY: '250px',
    scrollCollapse: true,
    dom: 'Bfrtip',
    // buttons: [
    //   'copyHtml5',
    //   'excelHtml5',
    //   'csvHtml5',
    //   'pdfHtml5'
    // ]
  });
});