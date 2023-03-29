@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Relationship Creation</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('relationship.index') }}">Relationships</a>
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
                            <h4>New Relationship</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation"
                            novalidate action="{{ route('relationship.store') }}"
                            method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Relationship Name</label>
                                <input type="text"
                                    class="form-control text-capitalize @error('name') is-invalid @enderror"
                                    id="name"
                                    value="{{ old('name') }}"
                                    placeholder="Type relationship name here"
                                    autofocus
                                    name="name">
                                <div class="invalid-feedback">
                                    @error('name')
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
