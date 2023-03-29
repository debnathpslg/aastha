@extends('main')

@section('content')
<div class="pagetitle">
    <h1>User Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">Users</a>
            </li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <span class="float-start">
                            <h4>User Details</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="float-end">Name of User: </h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="float-start">{{ $user->name }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="float-end">Registered email: </h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="float-start">{{ $user->email }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="float-end">Joining Date: </h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="float-start">{{ $user->email_verified_at->format('d-M-Y') }}</h5>
                            </div>
                        </div>
                        <div class="row align-middle">
                            <div class="col-lg-4">
                                <h5 class="float-end">User Status: </h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="float-start btn btn-sm rounded-pill text-bg-success">ACTIVE</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="float-end">User Role: </h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="float-start">{{ $user->role->name }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="float-end">Controlled Locations: </h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="float-start">
                                    @foreach ($user->location as $location)
                                    <span class="btn btn-sm rounded-pill text-bg-primary m-1">
                                        {{ $location->name." (".$location->short_name.")" }}
                                    </span>
                                    @endforeach
                                </h5>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="#"
                                        class="btn btn-sm btn-outline-danger float-end m-1"
                                        onclick="event.preventDefault();
                                            if(confirm('Deactivate {{ $user->name }}?')) {
                                                document.getElementById('deactiveUserForm').submit();
                                            }">
                                        <i class="bi bi-person-x"></i>
                                        Deactivate User
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}"
                                        method="POST"
                                        style="display: none;"
                                        id="deactiveUserForm">
                                        @csrf
                                        $@method('DELETE')
                                    </form>
                                    <button class="btn btn-sm btn-outline-warning float-end m-1"
                                        onclick="event.preventDefault();
                                            if(confirm('Reset password for {{ $user->name }}?')) {
                                                document.getElementById('resetPwdForm').submit();
                                            }">
                                        <i class="bi bi-key"></i>
                                        Reset Password
                                    </button>
                                    <form action="{{ route('user.reset-pwd', $user->id) }}"
                                        method="POST"
                                        style="display: none;"
                                        id="resetPwdForm">
                                        @csrf
                                    </form>
                                    <a href="{{ route('user.edit', $user->id) }}"
                                        class="btn btn-sm btn-outline-primary float-end m-1">
                                        <i class="bi bi-pencil"></i>
                                        Edit User
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>

@endsection
