{{--  <script src="{{ asset('admin') }}/app-assets/vendors/js/vendors.min.js"></script>  --}}
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/vendors/js/charts/chart.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/font-awesom/all.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/js/core/app-menu.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/js/core/app.min.js"></script>
<script src="{{ asset('admin') }}/app-assets/js/scripts/customizer.min.js"></script>


<script src="{{ asset('admin') }}/app-assets/js/scripts/tables/table-datatables-basic.js"></script>
<script src="{{ asset('admin') }}/app-assets/js/scripts/forms/form-validation.js"></script>
<script>
    function confirmDelete(item_id) {
        Swal.fire({
            title: "Are you sure?",
            text: `You won"t be able to revert this!`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $('#' + item_id).submit();
            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Your imaginary file is safe :)",
                    "error"
                )
            }
        });
    }
</script>
