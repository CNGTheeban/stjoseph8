@extends("layouts.app")

@section("title", "ST. Joseph's College | Profile")

@section("content")

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
            $user = Auth::user();
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
                            <h1>Welcome, <?php echo $user->username ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Welcome, <?php echo $user->username ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>           

            

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
                                    <h3 class="profile-username text-center">Nina Mcintire</h3>
                                    <p class="text-muted text-center">[User Type]</p>
                                    <!-- <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item text-center">[User Type]
                                            <a class="float-right">[User Type]</a>
                                        </li>
                                        <li class="list-group-item text-center">[Address]</li>
                                        <li class="list-group-item text-center">[NIC]</li>
                                    </ul> -->
                                    <a href="/addParents" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit</a>
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
                                    <p class="text-muted">[Address]</p>
                                    <hr>
                                    <strong><i class="fas fa-book mr-1"></i> NIC</strong>
                                    <p class="text-muted">[NIC No]</p>
                                    <hr>
                                    <strong><i class="fas fa-phone"></i> Contact No</strong>
                                    <a href="#" class="text-muted">[Contact No]</a>
                                    <hr>
                                    <strong><i class="fas fa-phone"></i> Mobile No</strong>
                                    <a href="#" class="text-muted">[Mobile No]</a>
                                    <hr>
                                    <strong><i class="far fa-envelope"></i> Email</strong>
                                    <a href="#" class="text-muted">[email address]</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <h3 class="card-title p-2">Childrens</h3>
                                    <a href="add_childs.php" type="button" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> New Children</a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Admission No</th>
                                                <th>Name</th>
                                                <th>Grade</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                Explorer 4.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" id="editChildren" name="editChildren"><i class="fas fa-edit"></i></button> | 
                                                    <button type="button" class="btn btn-success" id="payfee" name="payfee"><i class="fas fa-donate"></i></button> | 
                                                    <button type="button" class="btn btn-danger" id="deleteChildren" name="deleteChildren"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                Explorer 5.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td>5</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" id="editChildren" name="editChildren"><i class="fas fa-edit"></i></button> | 
                                                    <button type="button" class="btn btn-success" id="payfee" name="payfee"><i class="fas fa-donate"></i></button> | 
                                                    <button type="button" class="btn btn-danger" id="deleteChildren" name="deleteChildren"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
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