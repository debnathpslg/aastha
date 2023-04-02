@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Employees View</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('employee.index', 'active') }}">Employees</a>
            </li>
            <li class="breadcrumb-item active">Show Employee Details</li>
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
                        <h4>{{ $dataSet->employee_name }}({{ $dataSet->employee_code }})</h4>
                    </div>
                    <div class="card-body">
                        <div class="accordion mt-3" id="empAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOrg"
                                        aria-expanded="true"
                                        aria-controls="collapseOrg">
                                        Organisation Details
                                    </button>
                                </h2>
                                <div id="collapseOrg"
                                    class="accordion-collapse collapse show"
                                    data-bs-parent="#empAccordion">
                                    <div class="accordion-body" style="background-color:oldlace;"> {{-- rgb(216, 253, 255); --}}
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Employee Code</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->employee_code }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Employee Name</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->employee_name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Employee Approval Status</strong></div>
                                            <div class="col-lg-9">
                                                @if ($dataSet->is_authorised)
                                                <span class="badge badge-sm text-bg-success rounded-pill">
                                                    Authorised
                                                </span>
                                                @else
                                                <a href="#" class="btn btn-sm text-bg-danger rounded-pill" onclick="event.preventDefault();
                                                    if(confirm('Authorise Employee?'))
                                                        { document.getElementById('authEmpForm').submit();}">
                                                    Auth Pending
                                                </a>
                                                <form action="{{ route('employee.authemp', [$id, $q]) }}"
                                                    method="POST"
                                                    id="authEmpForm"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('PATCH')
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Work Status</strong></div>
                                            <div class="col-lg-9">
                                                @if ($dataSet->workStatus->name == "Active")
                                                <span class="badge badge-sm text-bg-success rounded-pill">
                                                    {{ $dataSet->workStatus->name }}
                                                </span>
                                                @else
                                                <span class="badge badge-sm text-bg-danger rounded-pill">
                                                    {{ $dataSet->workStatus->name }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Location</strong></div>
                                            <div class="col-lg-9">
                                                <span class="badge badge-sm text-bg-primary rounded-pill">
                                                    {{ $dataSet->location->name }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Designation</strong></div>
                                            <div class="col-lg-9">
                                                <span class="badge badge-sm text-bg-primary rounded-pill">
                                                    {{ $dataSet->designation->name }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Date of Join</strong></div>
                                            <div class="col-lg-9">
                                                @if (!isset($dataSet->date_of_join) || $dataSet->date_of_join == "")
                                                    <span class="badge badge-sm text-bg-warning rounded-pill">
                                                        Not Available
                                                    </span>
                                                @else
                                                    {{ date('d-M-Y', strtotime($dataSet->date_of_join)) }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Date of Resign</strong></div>
                                            <div class="col-lg-9">
                                                @if (!isset($dataSet->date_of_resignation) || $dataSet->date_of_resignation == "")
                                                    <span class="badge badge-sm text-bg-warning rounded-pill">
                                                        Not Available
                                                    </span>
                                                @else
                                                    {{ date('d-M-Y', strtotime($dataSet->date_of_resignation)) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapsePers"
                                        aria-expanded="true"
                                        aria-controls="collapsePers">
                                        Personal Details
                                    </button>
                                </h2>
                                <div id="collapsePers"
                                    class="accordion-collapse collapse"
                                    data-bs-parent="#empAccordion">
                                    <div class="accordion-body" style="background-color:oldlace;"> {{-- rgb(216, 253, 255); --}}
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Fathers Name</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->fathers_name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Address</strong></div>
                                            <div class="col-lg-9"><p>{{ $dataSet->address }}-{{ $dataSet->pin }}</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Email</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->email }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Mobile No</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->mobile_no }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Alternate Mobile No</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->alternate_no }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Office Mobile No</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->office_mobile_no }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Emergency Contact Name</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->local_guardian_name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Emergency Contact No</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->local_guardian_contact_no }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Date of Birth</strong></div>
                                            <div class="col-lg-9">
                                                @if (!isset($dataSet->date_of_birth) || $dataSet->date_of_birth == "")
                                                    <span class="badge badge-sm text-bg-warning rounded-pill">
                                                        Not Available
                                                    </span>
                                                @else
                                                    {{ date('d-M-Y', strtotime($dataSet->date_of_birth)) }}
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseBank"
                                        aria-expanded="true"
                                        aria-controls="collapseBank">
                                        Bank Details
                                    </button>
                                </h2>
                                <div id="collapseBank"
                                    class="accordion-collapse collapse"
                                    data-bs-parent="#empAccordion">
                                    <div class="accordion-body" style="background-color:oldlace;"> {{-- rgb(216, 253, 255); --}}
                                        <div class="row">
                                            <div class="col-lg-3"><strong>A/c Holder Name</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->account_holder_name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Relationship with A/c Holder</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->relationship->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>A/c No</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->account_number }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Bank Name</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->ifsc->bank }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Branch Name</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->ifsc->branch }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>IFSC</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->ifsc->ifsc }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Bank A/c Change Status</strong></div>
                                            <div class="col-lg-9">
                                                @if (!$dataSet->is_bank_changed)
                                                <span class="badge badge-sm text-bg-success rounded-pill">
                                                    No Changes Requested
                                                </span>
                                                @else
                                                <span class="badge badge-sm text-bg-danger rounded-pill">
                                                    Auth Pending
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseDoc"
                                        aria-expanded="true"
                                        aria-controls="collapseDoc">
                                        Document Details
                                    </button>
                                </h2>
                                <div id="collapseDoc"
                                    class="accordion-collapse collapse"
                                    data-bs-parent="#empAccordion">
                                    <div class="accordion-body" style="background-color:oldlace;"> {{-- rgb(216, 253, 255); --}}
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Bio-Data Submitted?</strong></div>
                                            <div class="col-lg-9">Not Available</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Aadhaar Card Copy Submitted?</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->aadhaar_no }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Pan Card Copy Submitted?</strong></div>
                                            <div class="col-lg-9">{{ $dataSet->pan_no }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3"><strong>Photo Submitted?</strong></div>
                                            <div class="col-lg-9">Not Available</div>
                                        </div>
                                    </div>
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
