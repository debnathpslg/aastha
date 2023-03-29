<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('home.index') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Administration</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#masters-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Masters</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="masters-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('role.index') }}">
                    <i class="bi bi-circle"></i><span>Role</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('location.index') }}">
                    <i class="bi bi-circle"></i><span>Location</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}">
                    <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Components</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-people"></i>
                <span>Employee</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-coin"></i>
                <span>Deposition</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->
