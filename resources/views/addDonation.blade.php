@extends("layouts.app")

@section("title", "ST. Joseph's College | Add Donation")

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
                            <h1>Add Donation</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Add Donation</li>
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
                                <h3 class="card-title">Add Donation Form</h3>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="" method="POST" id="add_donation_form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputDonRef">Donation Reference</label>
                                                <input type="text" class="form-control" name="inputDonRef" id="inputDonRef" placeholder="Enter Donation Reference">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputDonAmount">Donation Amount</label>
                                                <input type="text" class="form-control" name="inputDonAmount" id="inputDonAmount" placeholder="Enter Donation Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-donate"></i> Donate</button>
                                        </div>
                                    </div>
                                </form>
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