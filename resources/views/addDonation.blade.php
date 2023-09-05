@extends("layouts.app")

@section("title", "ST. Joseph's College | Add Donation")

@section("content")
      
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

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        @include('partials.preloader')

        <!-- Content Wrapper. Contains page content -->
        {{-- <div class="content-wrapper"> --}}
            <div class="container">
                <div class="row">
                    <div class="card" style="background-color:transparent;border: 0px solid #FFFFFF;border-radius:0;">
                        <br>
                        <div class="register-logo">
                            <a href="/index"><img class="" src="{{ asset('img/logo-sjc.png') }}" /> ST. JOSEPH'S COLLEGE</a>
                        </div>
                        <div class="card-header">
                            <h1 class="card-title" style="text-align:center;float:none;font-size:2.0rem;">Donation</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pay.donation') }}" method="POST" id="add_donation_form">
                                @csrf 
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputFirstName">First Name</label>
                                            <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter your First Name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputLastName">Last Name</label>
                                            <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter your Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter your Email">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputContactNo">Contact No</label>
                                            <input type="tel" class="form-control" name="inputContactNo" id="inputContactNo" placeholder="Enter your Contact No">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDonRef">Donation Reference</label>
                                            <input type="text" class="form-control" name="inputDonRef" id="inputDonRef" placeholder="Enter your Donation Reference">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputDonAmount">Donation Amount</label>
                                            <input type="text" class="form-control" name="inputDonAmount" id="inputDonAmount" placeholder="Enter your Donation Amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-donate"></i> Donate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

@endsection