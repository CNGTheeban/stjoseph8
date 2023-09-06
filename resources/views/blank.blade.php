@extends("layouts.app")

@section("title", "ST. Joseph's College | Blank")

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

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection