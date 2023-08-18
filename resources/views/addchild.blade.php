@extends("layouts.app")

@section("title", "ST. Joseph's College | Add Child")

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
                @include('partials.admin_sidebar')
            @endif
        @endauth

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Children</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Add Children</li>
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
                                <h3 class="card-title">Creat Children Form</h3>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="" method="POST" id="add_children_form">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputFullName">Full Name</label>
                                                <input type="text" class="form-control" name="inputFullName" id="inputFullName" placeholder="Enter Your Child's Full Name">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputInitialName">Initial Name</label>
                                                <input type="text" class="form-control" name="inputInitialName" id="inputInitialName" placeholder="Enter Initial Name">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputDOB">Date of Birth</label>
                                                <input type="date" class="form-control" name="inputDOB" id="inputDOB" placeholder="Enter your Child's DOB">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputGrade">Child's Grade</label>
                                                <input type="number" class="form-control" name="inputGrade" id="inputGrade" placeholder="Enter your Child's Grade">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputAdmissionNO">Child's Admission No</label>
                                                <input type="text" class="form-control" name="inputAdmissionNO" id="inputAdmissionNO" placeholder="Enter your Child's admission no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add</button>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <table id="childTempTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Child Name</th>
                                                    <th>Admission No</th>
                                                    <th>Date of Birth</th>
                                                    <th>Grade</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Trident</td>
                                                    <td>Internet Explorer 4.0</td>
                                                    <td>Win 95+</td>
                                                    <td> 4</td>
                                                    <td>X</td>
                                                </tr>
                                                <tr>
                                                    <td>Trident</td>
                                                    <td>Internet Explorer 5.0</td>
                                                    <td>Win 95+</td>
                                                    <td>5</td>
                                                    <td>C</td>
                                                </tr>
                                            </tbody>             
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Save</button>
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