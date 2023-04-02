@extends('main')

@section('content')
<div class="pagetitle">
    <h1>New Employees</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('employee.index', 'active') }}">Employees</a>
            </li>
            <li class="breadcrumb-item active">Create New</li>
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
                                    <h4>Create New Employee</h4>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <form class="row g-3 needs-validation" novalidate action="{{ route('employee.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-3">
                                            <label for="employee_code" class="form-label">Temporary Employee Code</label>
                                            <input type="text"
                                                class="form-control"
                                                id="employee_code"
                                                name="employee_code"
                                                value="1000000"
                                                disabled readonly>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="work_status_id" class="form-label">Work Status</label>
                                            <select name="work_status_id"
                                                id="work_status_id"
                                                class="form-select"
                                                disabled>
                                                <option value="{{ $allWorkStatuses->id }}" selected>{{ $allWorkStatuses->name }}</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="location_id" class="form-label">Location</label>
                                            <select name="location_id"
                                                id="location_id"
                                                class="form-select @error('location_id') is-invalid @enderror"
                                                autofocus>
                                                <option selected disabled value="">Select Location</option>
                                                @foreach ($allLocations as $item)
                                                <option value="{{ $item->id }}" {{ old('location_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                @error('location_id')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="designation_id" class="form-label">Designation</label>
                                            <select name="designation_id"
                                                id="designation_id"
                                                class="form-select @error('designation_id') is-invalid @enderror"
                                                >
                                                <option selected disabled value="">Select Designation</option>
                                                @foreach ($allDesignations as $item)
                                                <option value="{{ $item->id }}" {{ old('designation_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                @error('designation_id')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="employee_name" class="form-label">Employee Name</label>
                                            <input name="employee_name"
                                                type="text"
                                                id="employee_name"
                                                class="form-control text-capitalize @error('employee_name') is-invalid @enderror"
                                                value="{{ old('employee_name') }}"
                                                placeholder="Employee Name"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('employee_name')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="fathers_name" class="form-label">Fathers Name</label>
                                            <input name="fathers_name"
                                                type="text"
                                                id="fathers_name"
                                                class="form-control text-capitalize"
                                                value="{{ old('fathers_name') }}"
                                                placeholder="Fathers Name"
                                                >
                                            </input>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea name="address"
                                                id="address"
                                                class="form-control text-capitalize"
                                                >{{ old('address') }}</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="pin" class="form-label">PIN</label>
                                            <input name="pin"
                                                type="text"
                                                id="pin"
                                                class="form-control @error('pin') is-invalid @enderror"
                                                value="{{ old('pin', '0') }}"
                                                placeholder="PIN"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('pin')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email"
                                                type="email"
                                                id="email"
                                                class="form-control text-lowercase @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}"
                                                placeholder="Email"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('email')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="mobile_no" class="form-label">Mobile No</label>
                                            <input name="mobile_no"
                                                type="text"
                                                id="mobile_no"
                                                class="form-control @error('mobile_no') is-invalid @enderror"
                                                value="{{ old('mobile_no') }}"
                                                placeholder="Mobile No"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('mobile_no')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alternate_no" class="form-label">Alternate No</label>
                                            <input name="alternate_no"
                                                type="text"
                                                id="alternate_no"
                                                class="form-control @error('alternate_no') is-invalid @enderror"
                                                value="{{ old('alternate_no') }}"
                                                placeholder="Alternate No"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('alternate_no')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="office_mobile_no" class="form-label">Office Mobile No</label>
                                            <input name="office_mobile_no"
                                                type="text"
                                                id="office_mobile_no"
                                                class="form-control @error('office_mobile_no') is-invalid @enderror"
                                                value="{{ old('office_mobile_no') }}"
                                                placeholder="Office Mobile No"
                                                >
                                            </input>
                                            <div class="invalid-feedback">
                                                @error('office_mobile_no')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                                            <input name="date_of_birth"
                                                type="date"
                                                id="date_of_birth"
                                                class="form-control"
                                                value="{{ old('date_of_birth') }}"
                                                >
                                            </input>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="date_of_join" class="form-label">Date of Join</label>
                                            <input name="date_of_join"
                                                type="date"
                                                id="date_of_join"
                                                class="form-control"
                                                value="{{ old('date_of_join') }}"
                                                >
                                            </input>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="local_guardian_name" class="form-label">Emergency Name</label>
                                            <input name="local_guardian_name"
                                                type="text"
                                                id="local_guardian_name"
                                                class="form-control"
                                                placeholder="Emergency Contact Name"
                                                value="{{ old('local_guardian_name') }}"
                                                >
                                            </input>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="local_guardian_contact_no" class="form-label">Emergency Contact</label>
                                            <input name="local_guardian_contact_no"
                                                type="text"
                                                id="local_guardian_contact_no"
                                                class="form-control"
                                                placeholder="Emergency Contact Number"
                                                value="{{ old('local_guardian_contact_no') }}"
                                                >
                                            </input>
                                        </div>

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

                                        <div class="col-md-6">
                                            <label for="aadhaar_no" class="form-label">Aadhaar No</label>
                                            <input name="aadhaar_no"
                                                type="text"
                                                id="aadhaar_no"
                                                class="form-control"
                                                value="{{ old('aadhaar_no') }}"
                                                placeholder="Aadhaar No"
                                                >
                                            </input>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="pan_no" class="form-label">PAN</label>
                                            <input name="pan_no"
                                                type="text"
                                                id="pan_no"
                                                class="form-control text-uppercase"
                                                value="{{ old('pan_no') }}"
                                                placeholder="PAN"
                                                >
                                            </input>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-sm btn-outline-primary float-end">Create</button>
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
