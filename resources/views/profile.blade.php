@extends("layouts.app")

@section("title", "ST. Joseph's College | Profile")

@section("content")

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
        use App\Http\Requests\RegistrationDataRequest;

            $user = Auth::user();
            $first_name = base64_decode($user->firstname);
            $last_name = base64_decode($user->lastname);
            $user_type = base64_decode($user->usertype);
        ?>
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
                            <h1>Welcome,
                                @foreach($userdata as $ud)
                                    {{ $ud->firstname }} {{ $ud->lastname }}
                                @endforeach
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Welcome, 
                                    @foreach($userdata as $ud)
                                        {{ $ud->firstname }} {{ $ud->lastname }}
                                    @endforeach
                                </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            {{-- {{ $userdata }} --}}
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <!-- <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="img/user4-128x128.jpg" alt="User profile picture">
                                    </div> -->
                                    <h3 class="profile-username text-center">
                                        @foreach($userdata as $ud)
                                            {{ $ud->firstname }} {{ $ud->lastname }}
                                        @endforeach
                                    </h3>
                                    <p class="text-muted text-center"><?php echo $user_type; ?></p>
                                    <!-- <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item text-center">[User Type]
                                            <a class="float-right">[User Type]</a>
                                        </li>
                                        <li class="list-group-item text-center">[Address]</li>
                                        <li class="list-group-item text-center">[NIC]</li>
                                    </ul> -->
                                    <a href="/addParent" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                    <p class="text-muted">
                                        @foreach($userdata as $ud)
                                            @if($ud->addressline1 != '')
                                                {{ $ud->addressline1 }},
                                            @endif 
                                            @if($ud->addressline2 != '')
                                                {{ $ud->addressline2 }},
                                            @endif 
                                            @if($ud->city != '')
                                            {{ $ud->city }}, @endif @if($ud->province != ''){{ $ud->province }},
                                            @endif 
                                            @if($ud->country != '')
                                            {{ $ud->country }}.
                                            @endif 
                                        @endforeach
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-book mr-1"></i> NIC</strong>
                                    <p class="text-muted">
                                        @foreach($userdata as $ud)
                                            {{ $ud->nic }}
                                        @endforeach
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-phone"></i> Contact No</strong>
                                    <a href="#" class="text-muted">
                                        @foreach($userdata as $ud)
                                            {{ $ud->contactno }}
                                        @endforeach
                                    </a>
                                    <hr>
                                    <strong><i class="fas fa-phone"></i> Mobile No</strong>
                                    <a href="#" class="text-muted">
                                        @foreach($userdata as $ud)
                                            {{ $ud->mobileno }}
                                        @endforeach
                                    </a>
                                    <hr>
                                    <strong><i class="far fa-envelope"></i> Email</strong>
                                    <a href="#" class="text-muted">
                                        @foreach($userdata as $ud)
                                            {{ $ud->email }}
                                        @endforeach
                                    </a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <h3 class="card-title p-2">Student</h3>
                                    <a href="{{ route('student.form') }}" type="button" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Add Student</a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align:center">
                                                <th>Admission No</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Grade</th>
                                                <th>Status</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            @foreach($students as $student)
                                                <tr>
                                                    <td> {{ $student->student_admissionNo }}</td>
                                                    <td> {{ $student->student_firstName }}</td>
                                                    <td> {{ $student->student_lastName }}</td>
                                                    <td> {{ $student->student_currentGrade }}</td>
                                                    @if( $student->student_status == 1)
                                                        <td><label class="ribbon bg-success">Active</label></td>
                                                    @else
                                                        <td><label class="ribbon bg-danger">Admin need to Verify</label></td>
                                                    @endif
                                                </tr>                                              
                                            @endforeach 
                                        </tbody>             
                                    </table>
                                </div><!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection