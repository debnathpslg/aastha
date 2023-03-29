@extends('main')

@section('content')
<div class="pagetitle">
    <h1>User Creation</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">Users</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
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
                            <h4>New User</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation"
                            novalidate action="{{ route('user.store') }}"
                            method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                    class="form-control text-capitalize @error('name') is-invalid @enderror"
                                    id="name"
                                    value="{{ old('name') }}"
                                    placeholder="Type name here"
                                    autofocus
                                    name="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="email" class="form-label">User Email</label>
                                <input type="email"
                                    class="form-control text-lowercase @error('email') is-invalid @enderror"
                                    id="email"
                                    value="{{ old('email') }}"
                                    placeholder="Type user email here"
                                    name="email">
                                <div class="invalid-feedback">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="role_id" class="form-label">User Role</label>
                                <select name="role_id"
                                    class="form-select @error('role_id') is-invalid @enderror"
                                    id="role_id">
                                    <option selected disabled value="">Choose Role from the list</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}" {{ old('role_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('role_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="location_id[]" class="form-label">User Location</label>
                                <select name="location_id[]" multiple size="9"
                                    class="form-select @error('location_id') is-invalid @enderror"
                                    id="location_id">
                                    <option selected disabled value="">Choose Location(s) from the list</option>
                                    @foreach ($locations as $item)
                                    <option value="{{ $item->id }}" {{in_array($item->id, old("location_id") ?: []) ? "selected": ""}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('location_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>

@endsection
