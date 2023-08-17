<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard.index') }}">SATPOLPPDAMKAR</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard.index') }}">Satpol</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">MENU</li>
            <li class="{{ request()->is('dashboard') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @can('list entries')
                <li class="{{ request()->is('reports') ? ' active' : '' }}">
                    <a href="{{ route('reports.index') }}" class="nav-link">
                        <i class="fas fa-poll"></i>
                        <span>Laporan Penegakan</span>
                    </a>
                </li>
            @endcan
            @can('add entries')
                <li class="{{ request()->is('reports/create') ? ' active' : '' }}">
                    <a href="{{ route('reports.create') }}" class="nav-link">
                        <i class="fas fa-poll"></i>
                        <span>Kuisioner</span>
                    </a>
                </li>
            @endcan
            @role('Admin')
                <li class="dropdown {{ request()->is('users', 'users/*', 'roles', 'roles/*') ? ' active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                        <span>Manajemen User</span></a>
                    <ul class="dropdown-menu">
                        @can('list user')
                            <li class="{{ request()->is('users', 'users/*') ? ' active' : '' }}"><a class="nav-link"
                                    href="{{ route('users.index') }}">Pengguna</a></li>
                        @endcan
                        @can('list role')
                            <li class="{{ request()->is('roles', 'roles/*') ? ' active' : '' }}"><a class="nav-link"
                                    href="{{ route('roles.index') }}">Role</a></li>
                        @endcan
                    </ul>
                </li>
            @endrole
        </ul>
    </aside>
</div>
