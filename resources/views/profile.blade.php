@extends("layouts.app")

@section("title", "ST. Joseph's College | Profile")

@section("content")

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
            $user = Auth::user();
            $user_name = $user->username;
            $user_type = $user->usertype;
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
                                    <h3 class="card-title p-2">Children</h3>
                                    <a href="{{ url('addchild/'.'0') }}" type="button" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> New Children</a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align:center">
                                                <th>Admission No</th>
                                                <th>Name</th>
                                                <th>Grade</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @foreach($childdata as $ud)
                                        <tr>
                                            <td> {{ $ud->childsAdmissionNo }}</td>
                                            <td> {{ $ud->fullName }}</td>
                                            <td> {{ $ud->childsGrade }}</td>
                                            @if( $ud->status == 1)
                                            <td><label class="ribbon bg-success">Active</label></td>
                                            @else
                                            <td><label class="ribbon bg-danger">Disabled</label></td>
                                            @endif
                                          
                                            <td>
                                                <button type="button" class="btn btn-warning" id="editChildren" name="editChildren"><a href="{{ url('addchild/'.$ud->id) }}"><i class="fas fa-edit"></i></a></button> | 
                                                <button type="button" class="btn btn-success" id="payfee" name="payfee"><i class="fas fa-donate"></i></button> | 
                                                @if( $ud->status !== 1)
                                                    <button class="btn btn-success" onclick="return confirm('{{ __('Are you sure you want to Enable?') }}')"><a href="{{ url('enablechild/'.$ud->id) }}"><i class="fas fa-toggle-on"></i></a></button>
                                                @else
                                                    <button type="button" class="btn btn-danger" id="deleteChildren" name="deleteChildren" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><a href="{{ url('deletechild/'.$ud->id) }}"><i class="fas fa-trash"></i></a></button>
                                                @endif
                                            </td> 
                                        </tr>
                                              
                                        @endforeach
                                              
                                           
                                        </tbody>             
                                    </table>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header p-2">
                                    <h3 class="card-title p-2">Donations</h3>
                                    <a href="add_donation.php" type="button" class="btn btn-primary float-right"><i class="fas fa-donate"></i> Donate Here</a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                            28 August 2023
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-money-bill-wave bg-success"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05 P.M</span>

                                                <h3 class="timeline-header">3rd Term Fee - 15,000 LKR</h3>

                                                {{-- <div class="timeline-body"></div> --}}
                                                {{-- <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div> --}}
                                            </div>
                                        </div><!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                            25 August 2023
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-donate bg-success"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 02:05 A.M</span>

                                                <h3 class="timeline-header">Donation - 5,000 LKR</h3>

                                                {{-- <div class="timeline-body"></div> --}}
                                                {{-- <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        {{-- <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        {{-- <div class="time-label">
                                            <span class="bg-success">
                                            3 Jan. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                <div class="timeline-body">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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