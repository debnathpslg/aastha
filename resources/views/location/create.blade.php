@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Location Creation</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('location.index') }}">Location</a>
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
                            <h4>New Location</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation"
                            novalidate action="{{ route('location.store') }}"
                            method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Location Name</label>
                                <input type="text"
                                    class="form-control text-capitalize @error('name') is-invalid @enderror"
                                    id="name"
                                    value="{{ old('name') }}"
                                    name="name"
                                    autofocus
                                    placeholder="Type location name here">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="short_name" class="form-label">Location Short Name</label>
                                <input type="text"
                                    class="form-control text-uppercase @error('short_name') is-invalid @enderror"
                                    id="short_name"
                                    name="short_name"
                                    placeholder="Type location short name here"
                                    value="{{ old('short_name') }}">
                                <div class="invalid-feedback">
                                    @error('short_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-sm btn-outline-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>

@endsection
