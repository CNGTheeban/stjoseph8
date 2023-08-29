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
                        <select class="form-control" name="inputUsertype" id="inputUsertype" placeholder="User type">
                            <option>Parent</option>
                            <option>Doner</option>
                        </select>
                        @if ($errors->has('inputUsertype'))
                            <span class="text-danger">{{ $errors->first('inputUsertype') }}</span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @if ($errors->has('inputUsername'))
                            <span class="text-danger">{{ $errors->first('inputUsername') }}</span>
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
                    {{-- <div class="input-group mb-3">
                        <input type="password" class="form-control" name="inputRePassword" id="inputRePassword" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="inputReference" id="inputReference" placeholder="Student Name or Admission No">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->has('inputReference'))
                            <span class="text-danger">{{ $errors->first('inputReference') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="inputSubmit" id="inputSubmit" class="btn btn-secondary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <a href="/login" class="text-center">I already have a membership</a>
            </div>
        </div>
    </div> 
@endsection