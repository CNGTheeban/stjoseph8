<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/logo-sjc.png') }}" alt="SJC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ST. JOSEPH'S COLLEGE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/index" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>                            
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>System Users <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/authUsers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Authorised</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/unauthUsers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unauthorised</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="/parents" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Parents/Doners</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/systemusers" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>System Users</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="/reports" class="nav-link">
                        <i class="nav-icon fas fa-paste"></i>
                        <p>Reports</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>