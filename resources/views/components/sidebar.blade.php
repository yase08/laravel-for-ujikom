<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="dashboard-ecommerce.html">Stisla Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard-ecommerce.html">SA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            @if (Auth::user()->hasRole('admin'))
                <li class="{{ Request::is('dashboard/user*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('user') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
            @endif
        </ul>
    </aside>
</div>
