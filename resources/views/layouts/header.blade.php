@php ($user = Session::get('current_user'))

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d3246; color: white;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand" href="{{route('homePage')}}">
            <img class="brand-logo-light" src="{{asset('storage/aastha.png')}}" alt="" width="140" height="37">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('homePage')}}">Home</a>
                </li>



                @if (Session::has('current_user'))
                    @if ($user->user_role >= 98)
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarDropdownUser">User</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                                <li><a href="/user/all" class="dropdown-item">List All Users</a></li>
                                <li><a href="/user/verified" class="dropdown-item">List Verified Users</a></li>
                                <li><a href="/user/unverified" class="dropdown-item">List Unverified Users</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="#" class="dropdown-item">Map User with Employee</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="#" class="dropdown-item">Delete All Unverified Users</a></li>
                            </ul>
                        </li> --}}
                    @endif
{{--                     
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="navbarDropdownEmp">Employee</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownEmp">
                            <li><a href="#" class="dropdown-item">List Employee</a></li>
                            <li><a href="#" class="dropdown-item">Add New Employee</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="#" class="dropdown-item">Download Employee Data</a></li>
                        </ul>
                    </li> --}}
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Session::has('current_user'))
                    @php ($curUser = Session::get('current_user'))
                    <li class="nav-item dropdown dropstart">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="navbarDropdownCurUser">
                            <img src="{{asset('storage/user_icon.png')}}" alt="" style="height: 2em; width: 2em;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-right" aria-labelledby="navbarDropdownCurUser">
                            <li><h6 class="dropdown-header">Hi {{$curUser->user_name}}</h6></li>
                            <li><a href="#" class="dropdown-item">Change Password</a></li>
                            <li><a href="{{route('logoutUser')}}" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

{{-- style="position: absolute; top: 100%; right: 0%;" --}}