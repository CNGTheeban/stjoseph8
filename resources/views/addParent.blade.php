@extends("layouts.app")

@section("title", "ST. Joseph's College | Blank")

@section("content")

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
        use App\Http\Requests\RegistrationDataRequest;

            $user = Auth::user();
            $user_id = $user->id;

            $first_name = base64_decode($user->firstname);
            $last_name = base64_decode($user->lastname);

            $user_name = base64_decode($user->firstname);

            $user_type = base64_decode($user->usertype);
        ?>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add <?php echo $user_type; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item"><a href="/profile"> <?php echo $user_type; ?></a></li>
                                <li class="breadcrumb-item active">Add <?php echo $user_type; ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            
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
            
            {{-- {{ $data }} --}}
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Create <?php echo $user_type; ?></h3>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="{{ route('parent.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" name="inputUserID" id="inputUserID" value="<?php echo $user_id; ?>" readonly>
                                    <input type="hidden" class="form-control" name="inputUserName" id="inputUserName" value="<?php echo $user_name; ?>" readonly>
                                    @if(count($data) != "0")
                                        @foreach($data as $user)
                                            <input type="hidden" class="form-control" name="inputUserDetailID" id="inputUserDetailID" value="{{ $user->id }}" readonly>
                                        @endforeach
                                    @else
                                        <input type="hidden" class="form-control" name="inputUserDetailID" id="inputUserDetailID" value="0" readonly>
                                    @endif
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputFirstName">First Name</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)                                                
                                                        <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter Your First Name" value="{{ $user['firstname'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter Your First Name" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputFirstName'))
                                                <span class="text-danger">{{ $errors->first('inputFirstName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputLastName">Last Name</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter Your Last Name" value="{{ $user['lastname'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter Your Last Name" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputFirstName'))
                                                <span class="text-danger">{{ $errors->first('inputLastName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputNIC">NIC</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="text" class="form-control" name="inputNIC" id="inputNIC" placeholder="Enter your NIC" value="{{ $user['nic'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputNIC" id="inputNIC" placeholder="Enter your NIC" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputNIC'))
                                                <span class="text-danger">{{ $errors->first('inputNIC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputAddressLine1">Address Line 1</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="text" class="form-control" name="inputAddressLine1" id="inputAddressLine1" placeholder="Enter your Address Line 1" value="{{ $user['addressline1'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputAddressLine1" id="inputAddressLine1" placeholder="Enter your Address Line 1" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputAddressLine1'))
                                                <span class="text-danger">{{ $errors->first('inputAddressLine1') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputAddressLine2">Address Line 2</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="text" class="form-control" name="inputAddressLine2" id="inputAddressLine2" placeholder="Enter your Address Line 2" value="{{ $user['addressline2'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputAddressLine2" id="inputAddressLine2" placeholder="Enter your Address Line 2" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputCity">City</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="text" class="form-control" name="inputCity" id="inputCity" placeholder="Enter your City" value="{{ $user['city'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputCity" id="inputCity" placeholder="Enter your City" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputCity'))
                                                <span class="text-danger">{{ $errors->first('inputCity') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputProvince">Province</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="text" class="form-control" name="inputProvince" id="inputProvince" placeholder="Enter your Province" value="{{ $user['province'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputProvince" id="inputProvince" placeholder="Enter your Province" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputProvince'))
                                                <span class="text-danger">{{ $errors->first('inputProvince') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputCountry">Country</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="text" class="form-control" name="inputCountry" id="inputCountry" placeholder="Enter your Country" value="{{ $user['country'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control" name="inputCountry" id="inputCountry" placeholder="Enter your Country" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputCountry'))
                                                <span class="text-danger">{{ $errors->first('inputCountry') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter your Email" value="{{ $user['email'] }}" readonly/>
                                                    @endforeach
                                                @else
                                                    <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter your Email" readonly/>
                                                @endif
                                            </div>
                                            @if ($errors->has('inputEmail'))
                                                <span class="text-danger">{{ $errors->first('inputEmail') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputContactNo">Contact No</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="tel" class="form-control" name="inputContactNo" id="inputContactNo" placeholder="Enter your Contact No" value="{{ $user['contactno'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="tel" class="form-control" name="inputContactNo" id="inputContactNo" placeholder="Enter your Contact No" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputContactNo'))
                                                <span class="text-danger">{{ $errors->first('inputContactNo') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputMobileNo">Mobile No</label>
                                                @if(count($data) != "0")
                                                    @foreach($data as $user)
                                                        <input type="tel" class="form-control" name="inputMobileNo" id="inputMobileNo" placeholder="Enter your Mobile No" value="{{ $user['mobileno'] }}" />
                                                    @endforeach
                                                @else
                                                    <input type="tel" class="form-control" name="inputMobileNo" id="inputMobileNo" placeholder="Enter your Mobile No" />
                                                @endif
                                            </div>
                                            @if ($errors->has('inputMobileNo'))
                                                <span class="text-danger">{{ $errors->first('inputMobileNo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                                
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection