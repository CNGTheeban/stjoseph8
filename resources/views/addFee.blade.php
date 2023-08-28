@extends("layouts.app")

@section("title", "ST. Joseph's College | Add Fee")

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
            @if(auth()->user()->usertype == 'Admin')
                @include('partials.admin_sidebar')
            @endif
            @if(auth()->user()->usertype == 'Parent')
                @include('partials.parent_sidebar')
            @endif
            @if(auth()->user()->usertype == 'Doner')
                @include('partials.doner_sidebar')
            @endif
        @endauth

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pay Fees</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Pay Fees</li>
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
                                <h3 class="card-title">Pay Children's Fee</h3>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="" method="POST" id="add_fee_form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputChildrenName">Child Name</label>
                                                <input type="text" class="form-control" name="inputChildrenName" id="inputChildrenName" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputAdmissionNo">Admision No</label>
                                                <input type="text" class="form-control" name="inputAdmissionNo" id="inputAdmissionNo" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputClass">Class</label>
                                                <input type="text" class="form-control" name="inputClass" id="inputClass" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputTerm">Term</label>
                                                <input type="text" class="form-control" name="inputTerm" id="inputTerm" placeholder="Ener child's your Term"/>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputAmount">Amount</label>
                                                <input type="text" class="form-control" name="inputAmount" id="inputAmount" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-donate"></i> Pay</button>
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