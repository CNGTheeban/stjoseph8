@extends("layouts.app")
<!-- Push a style dynamically from a view -->
@push('styles')
   <!-- Datatable CSS -->
<link href='https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery UI CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
<link href='https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>



@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
   <!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>



<script>
    let minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 DataTable.ext.search.push(function (settings, data, dataIndex) {
     let min = minDate.val();
     let max = maxDate.val();
     let date = new Date(data[1]);
  
     if (
         (min === null && max === null) ||
         (min === null && date <= max) ||
         (min <= date && max === null) ||
         (min <= date && date <= max)
     ) {
         return true;
     }
     return false;
 });
  
 // Create date inputs
 minDate = new DateTime('#min', {
     format: 'MMMM Do YYYY'
     
 });
 maxDate = new DateTime('#max', {
     format: 'MMMM Do YYYY'
 });
  
 // DataTables initialisation
 let table = $('#feePaymentTable1').DataTable( {
        dom: 'Bfrtip',
        
        buttons: ['csv', 'excel', 'pdf', 'print']
    } );;
  
 // Refilter the table
 document.querySelectorAll('#min, #max').forEach((el) => {
     el.addEventListener('change', () => table.draw());
 });

//  $(document).ready( function() {
//     $('#feePaymentTable').DataTable( {
//         destroy: true,
//         dom: 'Bfrtip',
//         buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print']
//     } );
// } );
</script>

@endpush
@section("title", "ST. Joseph's College | Fee Payments")

@section("content")

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        @include('partials.preloader')

        <!-- Navbar -->
        @include('partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @auth
            @if(base64_decode(auth()->user()->usertype) == 'Admin')
                @include('partials.admin_sidebar')
            @endif
            @if(base64_decode(auth()->user()->usertype) == 'User')
                @include('partials.parent_sidebar')
            @endif
        @endauth

         

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                            <h1>Donation Report</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Donation Report</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h3 class="card-title">Fee Payment List</h3>
                                <a href="{{ url('/addFee') }}" type="button" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Pay Fee</a>
                            </div> -->
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table cellspacing="5" cellpadding="5">
                                <tbody><tr>
                                    <td>From date:</td>
                                    <td><input type="text" id="min" name="min"></td>
                                </tr>
                                <tr>
                                    <td>To date:</td>
                                    <td><input type="text" id="max" name="max"></td>
                                </tr>
                            </tbody></table>
                                <table id="feePaymentTable1" class="display nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Paid Date</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Doner Ref</th>
                                            <th>Amount (LKR)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($donData as $ud)
                                    <tr>
                                         
                                            <td>{{ $ud->firstName }} {{ $ud->lastName }}</td>
                                            <td>{{ $ud->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $ud->email }}</td>
                                            <td>{{ $ud->contactno }}</td>
                                            <td>{{ $ud->donerRef }}</td>
                                            <td>{{ $ud->amount }}</td>
                                            @if( $ud->status !== 1)
                                            <td>Unpaid</td>
                                            @else
                                            <td>Paid</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                       
                                     
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->
@endsection