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
        @include('partials.sidebar')

        

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection