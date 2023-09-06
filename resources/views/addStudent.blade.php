@extends("layouts.app")

@section("title", "ST. Joseph's College | Add Student")

@section("content")

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
            $user = Auth::user();
            $user_id = $user->id;
        ?>
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
            @if(base64_decode(auth()->user()->usertype) == 'User')
                @include('partials.parent_sidebar')
            @endif
        @endauth

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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Student</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Add Student</li>
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
                                <h3 class="card-title">Student Registration Form</h3>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="{{ route('student.insert') }}" method="POST" id="add_student_form" enctype="multipart/form-data">
                                @csrf   
                                    @if($user_id != '')
                                        <input type="hidden" class="form-control" name="inputUserId" id="inputUserId" value="{{$user_id}}"placeholder="Enter Your Child's Full Name">
                                    @endif
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputAdmissionNo">Admission No</label>
                                                <input type="text" class="form-control" name="inputAdmissionNo" id="inputAdmissionNo" placeholder="Enter Student's Admission No">
                                            </div>
                                            @if ($errors->has('inputAdmissionNo'))
                                                <span class="text-danger">{{ $errors->first('inputAdmissionNo') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputFirstName">First Name</label>
                                                <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter Student's First Name">
                                            </div>
                                            @if ($errors->has('inputFirstName'))
                                                <span class="text-danger">{{ $errors->first('inputFirstName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputLastName">Last Name</label>
                                                <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter Student's Last Name">
                                            </div>
                                            @if ($errors->has('inputLastName'))
                                                <span class="text-danger">{{ $errors->first('inputLastName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputDOB">Date of Birth</label>
                                                <input type="date" class="form-control" name="inputDOB" id="inputDOB" placeholder="Enter your Student's DOB">
                                            </div>
                                            @if ($errors->has('inputDOB'))
                                                <span class="text-danger">{{ $errors->first('inputDOB') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputGrade">Student's Grade</label>
                                                <input type="number" class="form-control" name="inputGrade" id="inputGrade" placeholder="Enter your Student's Grade">
                                            </div>
                                            @if ($errors->has('inputGrade'))
                                                <span class="text-danger">{{ $errors->first('inputGrade') }}</span>
                                            @endif
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