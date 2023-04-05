@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Employees View (Bank Only)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('employee.index', 'active') }}">Employees</a>
            </li>
            <li class="breadcrumb-item active">Show Bank Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- Employee Bank Details Card -->
                <div class="card">
                    <div class="card-header">
                        <span class="float-start">
                            <h4>Bank Details of {{ $dataSet->employee_name }}</h4>
                        </span>
                        @if($dataSet->is_bank_changed)
                        <span class="float-end m-1">
                            <a href="#"
                                class="btn btn-sm btn-outline-primary"
                                onclick="event.preventDefault();
                                    if(confirm('Update New Bank Details?')) {
                                        document.getElementById('updateNewBank').submit();
                                    }"
                                >Update Bank Details</a>
                            <form action="{{ route('employee.updatebank', [$id, $q]) }}" method="POST" id="updateNewBank" style="display: none;">
                                @csrf
                                @method('PUT')
                            </form>
                        </span>
                        @else
                        <span class="float-end m-1">
                            <a href="{{ route('employee.changebank', [$id, $q]) }}" class="btn btn-sm btn-outline-primary">Change Bank Details</a>
                        </span>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Head</th>
                                            <th>Old Details</th>
                                            <th>New Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Employee Code</th>
                                            <td>{{ $dataSet->employee_code }}</td>
                                            <td>{{ $dataSet->employee_code }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Employee Name</th>
                                            <td>{{ $dataSet->employee_name }}</td>
                                            <td>{{ $dataSet->employee_name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Location</th>
                                            <td><span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->location->name }}</span></td>
                                            <td><span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->location->name }}</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Designation</th>
                                            <td><span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->designation->name }}</span></td>
                                            <td><span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->designation->name }}</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Account Holder Name</th>
                                            <td>{{ $dataSet->account_holder_name }}</td>
                                            <td>
                                                @if($dataSet->is_bank_changed)
                                                {{ $newBank->account_holder_name }}
                                                @else
                                                Not Available
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Relationship with Account Holder</th>
                                            <td><span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->relationship->name }}</span></td>
                                            <td>
                                                @if($dataSet->is_bank_changed)
                                                <span class="badge badge-sm rounded-pill text-bg-primary">{{ $newBank->relationship->name }}</span>
                                                @else
                                                Not Available
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Account No</th>
                                            <td>{{ $dataSet->account_number }}</td>
                                            <td>
                                                @if($dataSet->is_bank_changed)
                                                {{ $newBank->account_number }}
                                                @else
                                                Not Available
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bank Name</th>
                                            <td>{{ $dataSet->ifsc->bank }}</td>
                                            <td>
                                                @if($dataSet->is_bank_changed)
                                                {{ $newBank->ifsc->bank }}
                                                @else
                                                Not Available
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Branch Name</th>
                                            <td>{{ $dataSet->ifsc->branch }}</td>
                                            <td>
                                                @if($dataSet->is_bank_changed)
                                                {{ $newBank->ifsc->branch }}
                                                @else
                                                Not Available
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">IFSC</th>
                                            <td><span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->ifsc->ifsc }}</span></td>
                                            <td>
                                                @if($dataSet->is_bank_changed)
                                                <span class="badge badge-sm rounded-pill text-bg-primary">{{ $newBank->ifsc->ifsc }}</span>
                                                @else
                                                Not Available
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Employee Bank Details Card -->
            </div>
        </div>
    </div>
</section>
@endsection
