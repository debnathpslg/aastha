@extends('Layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">New Onboarding Form</h4>
            </div>

            <form method="POST" 
                action="{{ route('onboardings.store') }}" 
                class="row g-3 m-2" 
                enctype="multipart/form-data"
                novalidate>
                @csrf

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Personal Info</h4>
                    {{-- @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif --}}
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            {{-- Candidate Name --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="full_name"
                                labelCaption="Candidate Full Name"
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Candidate Mobile Number --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="number"
                                name="mobile_no"
                                labelCaption="Candidate Mobile No"
                                {{-- extraClass="text-uppercase" --}}
                                required
                            />

                            {{-- Candidate Altername Mobile Number --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="number"
                                name="alternate_mobile_no"
                                labelCaption="Alternate Mobile No"
                                {{-- extraClass="text-uppercase" --}}
                                {{-- required --}}
                            />

                            {{-- Candidate Personal Email --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="email"
                                name="email"
                                labelCaption="Personal Email"
                                extraClass="text-lowercase"
                                {{-- required --}}
                            />

                            {{-- Candidate Date of Birth --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="date"
                                name="dob"
                                labelCaption="Date of Birth"
                                {{-- extraClass="text-lowercase" --}}
                                required
                            />

                            {{-- Gender --}}
                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Gender"
                                name="gender"
                                :options="\App\Enums\GenderEnum::options()"
                                required
                            />

                            {{-- Marital Status --}}
                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Marital Status"
                                name="marital_status"
                                :options="\App\Enums\MaritalStatusEnum::options()"
                                required
                            />

                            {{-- Nationality --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="nationality"
                                labelCaption="Nationality"  
                                extraClass="text-capitalize"
                                receivedData="Indian"
                                required
                            />
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Family Info</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            {{-- Fathers Name --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="father_name"
                                labelCaption="Fathers Name"  
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Local Guardian Name --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="local_guardian_name"
                                labelCaption="Local Guardian Name"  
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Local Guardian Mobile --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="number"
                                name="local_guardian_mobile"
                                labelCaption="Local Guardian Mobile No"
                                {{-- extraClass="text-uppercase" --}}
                                required
                            />

                            {{-- Relation with LG --}}
                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Relation with LG"
                                name="local_guardian_relation_id"
                                :options="$relations"
                                required
                            />
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Present Address</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            {{-- Present.Street --}}
                            <x-form.text-input 
                                colSpan='col-md-5'
                                type="text"
                                name="present[street]"
                                labelCaption="Street"
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Present.Locality --}}
                            <x-form.text-input 
                                colSpan='col-md-5'
                                type="text"
                                name="present[locality]"
                                labelCaption="Locality"
                                extraClass="text-capitalize"
                                {{-- required --}}
                            />

                            {{-- Present.City --}}
                            <x-form.text-input 
                                colSpan='col-md-2'
                                type="text"
                                name="present[city]"
                                labelCaption="City"
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Present.District --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="present[district]"
                                labelCaption="District"
                                extraClass="text-capitalize"
                                {{-- required --}}
                            />

                            {{-- Present.PO --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="present[post_office]"
                                labelCaption="Post Office"
                                extraClass="text-capitalize"
                                {{-- required --}}
                            />

                            {{-- Present.State --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="present[state]"
                                labelCaption="State"
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Present.PIN --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="number"
                                name="present[pin_code]"
                                labelCaption="PIN"
                                {{-- extraClass="text-capitalize" --}}
                                required
                            />
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Permanent Address</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            {{-- Permanent.Street --}}
                            <x-form.text-input 
                                colSpan='col-md-5'
                                type="text"
                                name="permanent[street]"
                                labelCaption="Street"
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Permanent.Locality --}}
                            <x-form.text-input 
                                colSpan='col-md-5'
                                type="text"
                                name="permanent[locality]"
                                labelCaption="Locality"
                                extraClass="text-capitalize"
                                {{-- required --}}
                            />

                            {{-- Permanent.City --}}
                            <x-form.text-input 
                                colSpan='col-md-2'
                                type="text"
                                name="permanent[city]"
                                labelCaption="City"
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Permanent.District --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="permanent[district]"
                                labelCaption="District"
                                extraClass="text-capitalize"
                                {{-- required --}}
                            />

                            {{-- Permanent.PO --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="permanent[post_office]"
                                labelCaption="Post Office"
                                extraClass="text-capitalize"
                                {{-- required --}}
                            />

                            {{-- Permanent.State --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="permanent[state]"
                                labelCaption="State"
                                extraClass="text-capitalize"
                                required
                            />

                            {{-- Permanent.PIN --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="number"
                                name="permanent[pin_code]"
                                labelCaption="PIN"
                                {{-- extraClass="text-capitalize" --}}
                                required
                            />
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Languages Known</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            @php
                                $skills = [
                                    'can_understand' => 'Understand', 
                                    'can_speak' => 'Speak', 
                                    'can_read' => 'Read', 
                                    'can_write' => 'Write'
                                ];
                            @endphp

                            <div class="table-responsive">
                                <table class="table table-bordered align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Language</th>
                                            @foreach ($skills as $label)
                                                <th class="text-center">{{ $label }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $languageId => $languageName)
                                            <tr>
                                                <td>
                                                    {{ $languageName }}
                                                </td>
                                                @foreach ($skills as $field => $label)
                                                    <td class="text-center">
                                                        <input
                                                            type="checkbox"
                                                            name="languages[{{ $languageId }}][{{ $field }}]"
                                                            value="1"
                                                            @checked(old("languages.$languageId.$field"))
                                                        />
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @php
                                    $languageErrors = collect($errors->get('languages.*.*'))
                                        ->flatten()
                                        ->implode(' ');
                                @endphp

                                @if($languageErrors)
                                    <div class="text-danger small">{{ $languageErrors }}</div>
                                @else
                                    @error('languages')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Education Qualification</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            {{-- Highest Standard --}}
                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Highest Standard"
                                name="education_standard_id"
                                :options="$educationStds"
                                required
                            />

                            {{-- Board/University --}}
                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Board/University"
                                name="education_board_id"
                                :options="$educationBoards"
                                required
                            />

                            {{-- Passing Year --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="number"
                                name="year_of_passing"
                                labelCaption="Year of Passing"
                                {{-- extraClass="text-capitalize" --}}
                                required
                            />

                            {{-- Remarks --}}
                            <x-form.text-input 
                                colSpan='col-md-3'
                                type="text"
                                name="remarks"
                                labelCaption="Remarks"
                                receivedData="Pass"
                                extraClass="text-capitalize"
                                {{-- required --}}
                            />
                        </div>
                    </div>
                </div>
                
                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Work Experience</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Support Documents</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            <table class="table table-bordered" id="documents-table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Document Type</th>
                                        <th>Upload File</th>
                                        {{-- <th style="width: 20%">Remarks</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- Mandatory Photo Row --}}
                                    <tr>
                                        <td>
                                            <select
                                                name="documents[0][support_doc_type_id]"
                                                class="form-control"
                                                readonly
                                                {{-- disabled --}}
                                            >
                                                <option value="{{ $photoDocType->id }}">
                                                    Photo (Mandatory)
                                                </option>
                                            </select>
                                        </td>

                                        <td>
                                            <input
                                                type="file"
                                                name="documents[0][file]"
                                                class="form-control"
                                                required
                                            >
                                        </td>

                                        {{-- <td>
                                            <input
                                                type="text"
                                                name="documents[0][remarks]"
                                                class="form-control"
                                            >
                                        </td> --}}

                                        <td class="text-center text-muted">
                                            --
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            @php
                                $documentErrors = collect($errors->get('documents.*.*'))
                                    ->flatten()
                                    ->implode(' ');
                            @endphp

                            @if($documentErrors)
                                <div class="text-danger small">{{ $documentErrors }}</div>
                            @else
                                @error('documents')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            @endif

                            {{-- <button
                                type="button"
                                class="btn btn-outline-primary btn-sm"
                                id="add-document-row"
                            >
                                + Add Document
                            </button> --}}
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-12 bg-secondary text-white">
                    <h4 class="card-title">Signing Declaration</h4>
                </div>
                <hr>
                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="action-form">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                <a type="submit" 
                                    class="btn btn-dark waves-effect waves-light"
                                    href="{{ route('onboardings.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection