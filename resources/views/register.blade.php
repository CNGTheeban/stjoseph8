@extends("layouts.master")

@section("title", "ST. Joseph's College | Registration")

@section("content")
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><img class="" src="{{ asset('img/logo-sjc.png') }}" /> ST. JOSEPH'S COLLEGE</a>
        </div>

        <div class="card" style="background-color:transparent;border: 1px solid #FFFFFF;border-radius:0;">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="index.html" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
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
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="inputRePassword" id="inputRePassword" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
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