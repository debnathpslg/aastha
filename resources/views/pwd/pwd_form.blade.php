@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Change Password</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
        <li class="breadcrumb-item active">Change Password</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Change Password for {{ Auth::user()->name }}</h5>

                        <form class="row g-3 needs-validation"
                            action="{{ route('pwd.save') }}"
                            method="POST"
                            novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    value="{{ old('password') }}"
                                    placeholder="Type new password here"
                                    required>
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input name="password_confirmation"
                                    class="form-control"
                                    id="password_confirmation"
                                    placeholder="Confirm new password here"
                                    value="{{ old('password_confirmation') }}"
                                    type="password"
                                    required>
                                @error('password_confirmation')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-sm btn-outline-primary mb-3" type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- End Top Selling -->
        </div>
    </div><!-- End Left side columns -->
</div>
@endsection
