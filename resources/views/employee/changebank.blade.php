@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Employee New Bank Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('employee.index', 'active') }}">Employees</a>
            </li>
            <li class="breadcrumb-item active">Change Bank</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- New Employee Form Card -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <span class="float-start">
                                    <h4>Change Employee Bank Details</h4>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <form class="row g-3 needs-validation" novalidate action="{{ route('employee.savebank', [$id, $q]) }}" method="POST">
                                        @csrf
                                        <div class="col-md-4">
                                            <label for="account_holder_name" class="form-label">Account Holder Name</label>
                                            <input name="account_holder_name"
                                                type="text"
                                                id="account_holder_name"
                                                class="form-control text-capitalize @error('account_holder_name') is-invalid @enderror"
                                                value="{{ old('account_holder_name') }}"
                                                placeholder="Name as in Bank Records"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('account_holder_name')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="relationship_id" class="form-label">Relation with A/c Holder</label>
                                            <select name="relationship_id"
                                                id="relationship_id"
                                                class="form-select @error('relationship_id') is-invalid @enderror"
                                                >
                                                <option selected disabled value="">Select Relationship</option>
                                                @foreach ($allRelations as $item)
                                                <option value="{{ $item->id }}" {{ old('relationship_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                @error('relationship_id')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="ifsc_id" class="form-label">IFSC</label>
                                            <input name="ifsc_id"
                                                type="text"
                                                id="ifsc_id"
                                                class="form-control text-uppercase @error('ifsc_id') is-invalid @enderror"
                                                value="{{ old('ifsc_id') }}"
                                                placeholder="IFSC"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('ifsc_id')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="account_number" class="form-label">Bank Account No</label>
                                            <input name="account_number"
                                                type="password"
                                                id="account_number"
                                                class="form-control @error('account_number') is-invalid @enderror"
                                                value="{{ old('account_number') }}"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('account_number')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="account_number_confirmation" class="form-label">Confirm Bank Account</label>
                                            <input name="account_number_confirmation"
                                                type="text"
                                                id="account_number_confirmation"
                                                class="form-control"
                                                value="{{ old('account_number_confirmation') }}"
                                                >
                                            </input>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-sm btn-outline-primary float-end">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End New Employee Form Card -->
            </div>
        </div>
    </div>
</section>
@endsection
