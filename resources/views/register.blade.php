@extends("layouts.master")

@section("title", "ST. Joseph's College | Registration")

@section("content")
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><img class="" src="{{ asset('img/logo-sjc.png') }}" /> ST. JOSEPH'S COLLEGE</a>
        </div>

        <div class="card" style="background-color:transparent;border: 1px solid #FFFFFF;border-radius:0;">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register A New Member</p>

                <form action="{{ url('custom-registration') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @if ($errors->has('inputFirstName'))
                            <span class="text-danger">{{ $errors->first('inputFirstName') }}</span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Last Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @if ($errors->has('inputLastName'))
                            <span class="text-danger">{{ $errors->first('inputLastName') }}</span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="inputNIC" id="inputNIC" placeholder="NIC No">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->has('inputNIC'))
                            <span class="text-danger">{{ $errors->first('inputNIC') }}</span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->has('inputEmail'))
                            <span class="text-danger">{{ $errors->first('inputEmail') }}</span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->has('inputPassword'))
                            <span class="text-danger">{{ $errors->first('inputPassword') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6"><a href="/login" class="btn btn-primary btn-block">Login</a></div>
                        <div class="col-6">
                            <button type="submit" name="inputSubmit" id="inputSubmit" class="btn btn-secondary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <br>
                <a href="/addDonation" class="btn btn-secondary btn-block">Donate Here</a>
            </div>
        </div>
    </div>
@endsection