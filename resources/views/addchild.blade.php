@extends("layouts.app")

@section("title", "ST. Joseph's College | Add Child")

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
            {{$childdata}}
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
                                    @if($user_id != '')
                                        <input type="text" class="form-control" name="inputUserId" id="inputUserId" value="{{$user_id}}"placeholder="Enter Your Child's Full Name">
                                    @else
                                    <input type="text" class="form-control" name="inputUserId" id="inputUserId" value="0" placeholder="Enter Your Child's Full Name">
                                    @endif
                                    @if(count($childdata) != '0')
                                        @foreach($childdata as $cd)
                                            <input type="text" class="form-control" name="inputChildId" id="inputChildId" value="{{$cd->id}}"placeholder="Enter Your Child's Full Name">
                                        @endforeach
                                    @else
                                        <input type="text" class="form-control" name="inputChildId" id="inputChildId" value="0" placeholder="Enter Your Child's Full Name">
                                    @endif
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputFullName">Full Name</label>
                                                @if(count($childdata) != '0')
                                                    @foreach($childdata as $cd)
                                                        <input type="text" class="form-control" name="inputFullName" id="inputFullName" value="{{$cd->fullName}}" placeholder="Enter Your Child's Full Name">
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputFullName" id="inputFullName" placeholder="Enter Your Child's Full Name">
                                                @endif
                                            </div>
                                            @if ($errors->has('inputFullName'))
                                                <span class="text-danger">{{ $errors->first('inputFullName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputInitialName">Initial Name</label>
                                                @if(count($childdata) != '0')
                                                    @foreach($childdata as $cd)
                                                        <input type="text" class="form-control" name="inputInitialName" id="inputInitialName" value="{{$cd->initialName}}" placeholder="Enter Initial Name">
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputInitialName" id="inputInitialName" placeholder="Enter Initial Name">
                                                @endif
                                            </div>
                                            @if ($errors->has('inputInitialName'))
                                                <span class="text-danger">{{ $errors->first('inputInitialName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputDOB">Date of Birth</label>
                                                @if(count($childdata) != '0')
                                                    @foreach($childdata as $cd)
                                                        <input type="date" class="form-control" name="inputDOB" id="inputDOB" value="{{$cd->DOB}}" placeholder="Enter your Child's DOB">
                                                    @endforeach
                                                @else
                                                    <input type="date" class="form-control" name="inputDOB" id="inputDOB" placeholder="Enter your Child's DOB">
                                                @endif
                                            </div>
                                            @if ($errors->has('inputDOB'))
                                                <span class="text-danger">{{ $errors->first('inputDOB') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputGrade">Child's Grade</label>
                                                @if(count($childdata) != '0')
                                                    @foreach($childdata as $cd)
                                                        <input type="number" class="form-control" name="inputGrade" id="inputGrade" value="{{$cd->childsGrade}}" placeholder="Enter your Child's Grade">
                                                    @endforeach
                                                @else
                                                    <input type="number" class="form-control" name="inputGrade" id="inputGrade" placeholder="Enter your Child's Grade">
                                                @endif
                                            </div>
                                            @if ($errors->has('inputGrade'))
                                                <span class="text-danger">{{ $errors->first('inputGrade') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputAdmissionNO">Child's Admission No</label>
                                                @if(count($childdata) != '0')
                                                    @foreach($childdata as $cd)
                                                        <input type="text" class="form-control" name="inputAdmissionNO" id="inputAdmissionNO" value="{{$cd->childsAdmissionNo}}" placeholder="Enter your Child's admission no">
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputAdmissionNO" id="inputAdmissionNO" placeholder="Enter your Child's admission no">
                                                @endif
                                            </div>
                                            @if ($errors->has('inputAdmissionNO'))
                                                <span class="text-danger">{{ $errors->first('inputAdmissionNO') }}</span>
                                            @endif
                                        </div>
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