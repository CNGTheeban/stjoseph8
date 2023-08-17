@extends("layouts.app")

@section("title", "ST. Joseph's College | Blank")

@section("content")

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        @include('partials.preloader')

        <!-- Navbar -->
        @include('partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Parents/Doners</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item"><a href="/profile">Parents/Doners</a></li>
                                <li class="breadcrumb-item active">Add Parents/Doners</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Creat Parents/Doners Form</h3>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="{{ route('parent.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputFirstName">First Name</label>
                                                <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter Your First Name">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputLastName">Last Name</label>
                                                <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter Your Last Name">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputNIC">NIC</label>
                                                <input type="text" class="form-control" name="inputNIC" id="inputNIC" placeholder="Enter your NIC">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputAddressLine1">Address Line 1</label>
                                                <input type="text" class="form-control" name="inputAddressLine1" id="inputAddressLine1" placeholder="Enter your Address Line 1">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputAddressLine2">Address Line 2</label>
                                                <input type="text" class="form-control" name="inputAddressLine2" id="inputAddressLine2" placeholder="Enter your Address Line 2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputCity">City</label>
                                                <input type="text" class="form-control" name="inputCity" id="inputCity" placeholder="Enter your City">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputProvince">Province</label>
                                                <input type="text" class="form-control" name="inputProvince" id="inputProvince" placeholder="Enter your Province">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputCountry">Country</label>
                                                <input type="text" class="form-control" name="inputCountry" id="inputCountry" placeholder="Enter your Country">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter your Email">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputContactNo">Contact No</label>
                                                <input type="tel" class="form-control" name="inputContactNo" id="inputContactNo" placeholder="Enter your Contact No">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputMobileNo">Mobile No</label>
                                                <input type="tel" class="form-control" name="inputMobileNo" id="inputMobileNo" placeholder="Enter your Mobile No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                                
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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