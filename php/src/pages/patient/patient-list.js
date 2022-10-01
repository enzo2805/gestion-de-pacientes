$(document).ready( function () {
  $('#table_id').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    ajax: '/pages/patient/get-patient.php',
    language: {
      url: '/assets/DataTables/es-ES.json',
  },
  });
});
