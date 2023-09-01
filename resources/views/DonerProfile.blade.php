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
            @if(auth()->user()->usertype == 'User')
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
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header p-2">
                                    <h3 class="card-title p-2">Donations</h3>
                                    <a href="{{ url('addDonation') }}" type="button" class="btn btn-primary float-right"><i class="fas fa-donate"></i> Donate Here</a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                            10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
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
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
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
                                        </div>
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