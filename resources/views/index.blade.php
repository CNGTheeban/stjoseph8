@extends("layouts.app")

@section("title", "ST. Joseph's College | Dashboard")

@section("content")

    <?php
        $user = Auth::user();
        $first_name = base64_decode($user->firstName);
        $last_name = base64_decode($user->lastName);
        $user_type = base64_decode($user->usertype);
    ?>

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
                                        @if($data['latestDonation'] != null)
                                            <?php
                                                $latestDonation = $data['latestDonation'];
                                            ?>
                                            {{-- {{$data['latestDonation']}} --}}
                                            {{-- @foreach($latestDonation as $lateDon) --}}
                                                {{ $latestDonation['created_at']->format('j F Y') }} - <small>LKR {{ $latestDonation['amount'] }}</small>
                                            {{-- @endforeach --}}
                                        @endif
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
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Donation Summery</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block border-right">
                                                        {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> --}}
                                                        <h5 class="description-header text-success">LKR {{ $data['overallDonationTotal'] }}</h5>
                                                        <span class="description-text">Total</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block">
                                                        {{-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> --}}
                                                        <h5 class="description-header text-success">LKR {{ $data['annualDonationTotal'] }}</h5>
                                                        <span class="description-text">Annually</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block border-right">
                                                        {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> --}}
                                                        <h5 class="description-header text-success">LKR {{ $data['monthlyDonationTotal'] }}</h5>
                                                        <span class="description-text">Monthly</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block">
                                                        {{-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> --}}
                                                        <h5 class="description-header text-success">LKR {{ $data['todayDonationTotal'] }}</h5>
                                                        <span class="description-text">Today</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                $donationData = $data['donationData'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Fees Summery</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block border-right">
                                                        {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> --}}
                                                        <h5 class="description-header text-success">$35,210.43</h5>
                                                        <span class="description-text">TOTAL REVENUE</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block">
                                                        {{-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> --}}
                                                        <h5 class="description-header text-success">$10,390.90</h5>
                                                        <span class="description-text">TOTAL COST</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block border-right">
                                                        {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> --}}
                                                        <h5 class="description-header text-success">$24,813.53</h5>
                                                        <span class="description-text">TOTAL PROFIT</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-6">
                                                    <div class="description-block">
                                                        {{-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> --}}
                                                        <h5 class="description-header text-success">1200</h5>
                                                        <span class="description-text">GOAL COMPLETIONS</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--/. container-fluid -->
                    </section>
                    <!-- /.content -->
                @endif
            @endauth
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->
@endsection