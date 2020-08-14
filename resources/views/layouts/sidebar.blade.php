<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview {{Route::is('employees.*') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::is('employees.*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('employees.create')}}" class="nav-link {{Route::is('employees.create') ? 'active' : ''}}">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Add employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employees.index')}}" class="nav-link {{Route::is('employees.index') ? 'active' : ''}}">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>All employees</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{Route::is('positions.*') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::is('positions.*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-chair"></i>
                        <p>
                            Positions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('positions.create')}}" class="nav-link {{Route::is('positions.create') ? 'active' : ''}}">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Add position</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('positions.index')}}" class="nav-link {{Route::is('positions.index') ? 'active' : ''}}">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>All positions</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
