$(document).ready(function(){
    $("#datatable").DataTable({
        lengthChange:true,
    }),
    $("#datatable-buttons").DataTable({
        lengthChange:true,
        // buttons:["copy","excel","pdf","colvis"]}).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
    });
});