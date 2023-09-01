@extends("layouts.app")

@section("title", "ST. Joseph's College | Dashboard")

@section("content")

    <?php
        $user = Auth::user();
        $user_name = $user->username;
        $user_type = $user->usertype;
    ?>

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
            @if(auth()->user()->usertype == 'User')
                @include('partials.parent_sidebar')
            @endif
        @endauth
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">SJC <?php echo $user_type; ?> Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
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
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-donate"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Last Donation</span>
                                    <span class="info-box-number">
                                        [Date] - <small>[Amount]</small>
                                    </span>
                                </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Last Fee</span>
                                    <span class="info-box-number">
                                        [Date] - <small>[Amount]</small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        {{-- <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sales</span>
                                    <span class="info-box-number">760</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">New Members</span>
                                    <span class="info-box-number">2,000</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div> --}}
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="card">
                            <div class="card-header p-2">
                                <h3 class="card-title p-2">Fees Summery</h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    {{-- @foreach($FeesData as $ud)
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-primary">
                                                {{ $ud->created_at->format('j F Y')}}
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-money-bill-wave bg-success"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> {{ $ud->created_at->format('H:i a')}}</span>

                                                <h3 class="timeline-header">Student Name: {{ $ud->fullName}}</h3>

                                                <div class="timeline-body">                                                        
                                                    Admission No : {{ $ud->childsAdmissionNo}}</br> 
                                                    Term : {{ $ud->term}} </br>
                                                    Amount : {{ $ud->amount}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach --}}
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->
@endsection