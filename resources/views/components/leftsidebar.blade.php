<div class="scroll-sidebar">
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item">
                <a
                    class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('home') }}"
                    aria-expanded="false"
                >
                    <i class="ti-loop"></i>
                    <span class="hide-menu">Back To Home</span>
                </a>
            </li>

            @suOrAdmin
            <li class="sidebar-item">
                <a
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false"
                >
                    <i class="mdi mdi-sitemap"></i>
                    <span class="hide-menu">Admin</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a
                            class="has-arrow sidebar-link"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        >
                            <i class="mdi mdi-svg"></i>
                            <span class="hide-menu">Master</span>
                        </a>
                        <ul
                            aria-expanded="false"
                            class="collapse second-level"
                        >
                            <li class="sidebar-item">
                                <a
                                    href="{{ route('roles.index') }}"
                                    class="sidebar-link"
                                >
                                    <i class="mdi mdi-account-box"></i>
                                    <span class="hide-menu"
                                        >User Roles</span
                                    >
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    href="{{ route('users.index') }}"
                                    class="sidebar-link"
                                >
                                    <i class="mdi mdi-cart"></i>
                                    <span class="hide-menu"
                                        >User</span
                                    >
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endsuOrAdmin
            <li class="sidebar-item">
                <a
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false"
                >
                    <i class="mdi mdi-sitemap"></i>
                    <span class="hide-menu">HR</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a
                            class="has-arrow sidebar-link"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        >
                            <i class="mdi mdi-svg"></i>
                            <span class="hide-menu">Employee</span>
                        </a>
                        <ul
                            aria-expanded="false"
                            class="collapse second-level"
                        >
                            <li class="sidebar-item">
                                <a
                                    href="{{ route('onboardings.index') }}"
                                    class="sidebar-link"
                                >
                                    <i class="mdi mdi-account-box"></i>
                                    <span class="hide-menu"
                                        >Onboarding</span
                                    >
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    {{-- href="{{ route('users.index') }}" --}}
                                    class="sidebar-link"
                                >
                                    <i class="mdi mdi-cart"></i>
                                    <span class="hide-menu"
                                        >Manage</span
                                    >
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
