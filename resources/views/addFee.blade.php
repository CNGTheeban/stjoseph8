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
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Pay Student's Fee</h3>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="{{ route('fee.insert') }}" method="POST" id="add_fee_form" enctype="multipart/form-data">
                                    @csrf   
                                   
                                    <div class="row">
                                        <!-- <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputClass">Class</label>
                                                <input type="text" class="form-control" name="inputClass" id="inputClass" />
                                            </div>
                                        </div> -->
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputTerm">Term</label>
                                                <select class="form-control" id="inputTerm" name="inputStudentId" required focus>
                                                    <option value="" disabled selected>Please select Student</option>   
                                                    @foreach($StudentData as $ud)     
                                                    <option value="{{ $ud->student_id }}">{{ $ud->student_admissionNo }} - {{ $ud->student_firstName }}</option>
                                                    @endforeach
                                                </select>
                                                <!-- <input type="text" class="form-control" name="inputTerm" id="inputTerm" placeholder="Ener child's your Term"/> -->
                                            </div>
                                        </div>
                                  
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputTerm">Term</label>
                                                <select class="form-control" id="inputTerm" name="inputTerm" required focus>
                                                    <option value="" disabled selected>Please select Term</option>        
                                                    <option value="1st Term">1st Term</option>
                                                    <option value="2nd Term">2nd Term</option>
                                                    <option value="3rd Term">3rd Term</option>
                                                </select>
                                                <!-- <input type="text" class="form-control" name="inputTerm" id="inputTerm" placeholder="Ener child's your Term"/> -->
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