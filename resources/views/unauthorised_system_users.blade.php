@extends("layouts.app")

@section("title", "ST. Joseph's College | List")

@section("content")

    <!-- Site wrapper -->
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Unauthorized System Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Unauthorized System Users</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                    <!-- <a href="add_parents.php" type="button" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> New Parents/Doners</a> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Reference</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($users) != '0')
                                                @foreach($users as $user)                                               
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->username}} - {{$user->usertype}}</td>
                                                        <td>{{$user->reference}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td><label class="ribbon bg-danger">Disabled</label></td>
                                                        <td><a type="button" class="btn btn-success" href="{{ url('/enableUnauthUsers/'.$user->id) }}" onclick="return confirm('{{ __('Are you sure you want to Enable?') }}')"><i class="fas fa-power-off"></i></a> | <a type="button" class="btn btn-danger" href="{{ url('/deleteUnauthUsers/'.$user->id) }}" onclick="return confirm('{{ __('Are you sure you want to Delete?') }}')"><i class="fas fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    There is no un-authorized users
                                                </tr>                                                
                                            @endif
                                        </tbody>             
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection