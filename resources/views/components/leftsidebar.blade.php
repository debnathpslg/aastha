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

            {{-- temporary links - begin --}}
            <li class="sidebar-item">
                <a
                    href="{{ route('languages.index') }}"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Languages</span
                    >
                </a>
            </li>

            <li class="sidebar-item">
                <a
                    href="{{ route('standards.index') }}"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Education Std.</span
                    >
                </a>
            </li>

            <li class="sidebar-item">
                <a
                    href="{{ route('boards.index') }}"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Edu. Board</span
                    >
                </a>
            </li>

            <li class="sidebar-item">
                <a
                    href="{{ route('relations.index') }}"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Relation</span
                    >
                </a>
            </li>

            <li class="sidebar-item">
                <a
                    href="{{ route('companies.index') }}"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Finance Company</span
                    >
                </a>
            </li>

            <li class="sidebar-item">
                <a
                    href="#"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Agreement</span
                    >
                </a>
            </li>

            <li class="sidebar-item">
                <a
                    href="{{ route('pdoctypes.index') }}"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Prop. Doc. Type</span
                    >
                </a>
            </li>

            <li class="sidebar-item">
                <a
                    href="#"
                    class="sidebar-link"
                >
                    <i class="mdi mdi-account-box"></i>
                    <span class="hide-menu"
                        >Prop. Documents</span
                    >
                </a>
            </li>
            {{-- temporary links - end --}}

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
