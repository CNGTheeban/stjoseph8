@extends("layouts.app")

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
                            <h1>Fee Payment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Fee Payment</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Fee Payment List</h3>
                                <a href="{{ url('/addFee') }}" type="button" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Pay Fee</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="feePaymentTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Admission No</th>
                                            <th>Paid Date</th>
                                            <th>Name</th>
                                            <th>Current Grade</th>
                                            <th>Purpose</th>
                                            <th>Amount (LKR)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($StudentData as $ud)
                                    <tr>
                                            <td>{{ $ud->student_admissionNo }}</td>
                                            <td>{{ $ud->created_at }}</td>
                                            <td>{{ $ud->student_firstName }} {{ $ud->student_lastName }}</td>
                                            <td>{{ $ud->student_currentGrade }}</td>
                                            <td>{{ $ud->term }}</td>
                                            <td>{{ $ud->amount }}</td>
                                            @if( $ud->student_status !== 1)
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