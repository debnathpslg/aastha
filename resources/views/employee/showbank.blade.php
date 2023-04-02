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
                        <h4>Bank Details of {{ $dataSet->employee_name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    Employee Code</div>
                                <div class="col-lg-9"><h4>{{ $dataSet->employee_code }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Employee Name</div>
                                <div class="col-lg-9">{{ $dataSet->employee_name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Location</div>
                                <div class="col-lg-9">
                                    <span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->location->name }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Designation</div>
                                <div class="col-lg-9">
                                    <span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->designation->name }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Account Holder Name</div>
                                <div class="col-lg-9">{{ $dataSet->account_holder_name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Relationship with Account Holder</div>
                                <div class="col-lg-9">
                                    <span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->relationship->name }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Account No</div>
                                <div class="col-lg-9">{{ $dataSet->account_number }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Bank Name</div>
                                <div class="col-lg-9">{{ $dataSet->ifsc->bank }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Branch Name</div>
                                <div class="col-lg-9">{{ $dataSet->ifsc->branch }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">IFSC</div>
                                <div class="col-lg-9">
                                    <span class="badge badge-sm rounded-pill text-bg-primary">{{ $dataSet->ifsc->ifsc }}</span>
                                </div>
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
