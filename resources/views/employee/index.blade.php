@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Employees Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Employees</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <!-- Active Employee Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('employee.index', 'active') }}" class="stretched-link">
                                    Active Employee
                                </a>
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $activeEmpCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Active Employee Card -->

                <!-- Approval Pending Employee Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('employee.index', "notapprove") }}" class="stretched-link">
                                    Approval Pending
                                </a>
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-x"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $notApprovedEmpCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Approval Pending Employee Card -->

                <!-- No Bank Employee Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('employee.index', 'nobank') }}" class="stretched-link">
                                    Empty Bank Details
                                </a>
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $noBankEmpCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End No Bank Employee Card -->

                <!-- Bank Changed Employee Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('employee.index', 'bankchange') }}" class="stretched-link">
                                    Bank Details Changed
                                </a>
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-pencil-square"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $bankChgEmpCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Bank Changed Employee Card -->

                <!-- Filter Card -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <span class="float-start">
                                    <h4>Filter Active Employee</h4>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <form class="row g-3 needs-validation" novalidate action="{{ route('employee.index', 'active') }}" method="GET">
                                        <div class="col-md-4">
                                            <label for="loc" class="form-label">Location</label>
                                            <select name="loc" id="loc" class="form-select">
                                                <option value="" selected>All Locations</option>
                                                @foreach ($allLocations as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="desig" class="form-label">Designation</label>
                                            <select name="desig" id="desig" class="form-select">
                                                <option value="" selected>All Designations</option>
                                                @foreach ($allDesignations as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="searchStr" class="form-label">Search String</label>
                                            <div class="input-group has-validation">
                                                <input type="text"
                                                    class="form-control"
                                                    id="searchStr"
                                                    name="searchStr"
                                                    aria-describedby="inputGroupPrepend"
                                                    value=""
                                                    >
                                                    <button class="btn btn-sm btn-outline-primary" id="inputGroupPrepend" type="submit">Go</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Card -->

                <!-- Employee List Card -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <span class="float-start">
                                    <h4>{{ $title }}</h4>
                                </span>
                                <span class="float-end m-1">
                                    <a href="#" class="btn btn-sm btn-outline-danger">Re Hire</a>
                                </span>
                                <span class="float-end m-1">
                                    <a href="{{ route('employee.create') }}" class="btn btn-sm btn-outline-primary">New Employee</a>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Employee Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Bank Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataSet as $key => $item)
                                            <tr>
                                                <th scope="col">{{ $key + $dataSet->firstItem() }}</th>
                                                <td>{{$item->employee_code }}</td>
                                                <td>
                                                    {{$item->employee_name }}
                                                </td>
                                                <td>{{$item->designation->name }}</td>
                                                <td>{{$item->location->name }}</td>
                                                <td>{{$item->email }}</td>
                                                <td>{{$item->mobile_no }}/{{$item->alternate_no }}</td>
                                                <td>
                                                    <a href="{{ route('employee.showbank', [$item->id, $q]) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                                                        <i class="bi bi-coin"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex align-items-center justify-content-center">
                                    {{ $dataSet->appends($params)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Employee List Card -->
            </div>
        </div>
    </div>
</section>

@endsection
