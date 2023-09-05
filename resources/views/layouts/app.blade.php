<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
        <style>
            .dark-mode input:-webkit-autofill, .dark-mode input:-webkit-autofill:hover, .dark-mode input:-webkit-autofill:focus, .dark-mode textarea:-webkit-autofill, .dark-mode textarea:-webkit-autofill:hover, .dark-mode textarea:-webkit-autofill:focus, .dark-mode select:-webkit-autofill, .dark-mode select:-webkit-autofill:hover, .dark-mode select:-webkit-autofill:focus{
                -webkit-text-fill-color:#000;
            }
            .dark-mode .form-control input:focus, .dark-mode .form-control select:focus{
                background-color: transparent!important;
            }
        </style>
    </head>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        
        @yield('content')

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{ asset('js/demo.js') }}"></script> --}}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('js/pages/dashboard2.js') }}"></script>
        
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>  
        
        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.js') }}"></script>

        <script>
            $(function () {
                $("#feePaymentTable").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#feePaymentTable_wrapper .col-md-6:eq(0)');

                // let minDate = $('<input type="date" class="form-control" id="min" name="min" placeholder="Start Date">');
                // let maxDate = $('<input type="date" class="form-control" id="max" name="max" placeholder="End Date">');
                // minDate.appendTo('#feePaymentTable_wrapper #feePaymentTable_filter');
                // maxDate.appendTo('#feePaymentTable_wrapper #feePaymentTable_filter');
            });

            
            // let minDate, maxDate;
 
            // // Custom filtering function which will search data in column four between two values
            // DataTable.ext.search.push(function (settings, data, dataIndex) {
            //     let min = minDate.val();
            //     let max = maxDate.val();
            //     let date = new Date(data[4]);
            
            //     if (
            //         (min === null && max === null) ||
            //         (min === null && date <= max) ||
            //         (min <= date && max === null) ||
            //         (min <= date && date <= max)
            //     ) {
            //         return true;
            //     }
            //     return false;
            // });
            
            // // Create date inputs
            // minDate = new DateTime('#min', {
            //     format: 'MMMM Do YYYY'
            // });
            // maxDate = new DateTime('#max', {
            //     format: 'MMMM Do YYYY'
            // });
            
            // // DataTables initialisation
            // let table = new DataTable('#example');
            
            // // Refilter the table
            // document.querySelectorAll('#min, #max').forEach((el) => {
            //     el.addEventListener('change', () => table.draw());
            // });
    </script>
    </body>
</html>
