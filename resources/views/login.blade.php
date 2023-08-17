@extends("layouts.master")

@section("title", "ST. Joseph's College | LogIn")

@section("content")    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><img class="" src="{{ asset('img/logo-sjc.png') }}" /> ST. JOSEPH'S COLLEGE</a>
        </div>
        <div class="card" style="background-color:transparent;border: 1px solid #FFFFFF;border-radius:0;">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ url('custom-login') }}" method="POST">                    
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-secondary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection