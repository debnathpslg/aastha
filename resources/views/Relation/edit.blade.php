@extends('Layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Relation Alteration Form</h4>
            </div>

            <form method="POST" 
                action="{{ route('relations.update', $relation) }}" 
                class="row g-3 m-2" novalidate>
                @csrf
                @method('PUT')

                <div class="card-body col-md-12">
                    <h4 class="card-title">Relation Info</h4>
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
                            <x-form.text-input 
                                colSpan='col-md-6'
                                type="text"
                                name="name"
                                labelCaption="Edu. Board"
                                extraClass="text-capitalize"
                                :receivedData="$relation->name"
                                required
                            />

                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Is Applicable for Beneficiary"
                                name="is_valid_beneficiary"
                                :options="[0 => 'No', 1 => 'Yes']"
                                :selectedData="$relation->is_valid_beneficiary"
                                required
                            />

                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Is Applicable for Reference"
                                name="is_valid_reference"
                                :options="[0 => 'No', 1 => 'Yes']"
                                :selectedData="$relation->is_valid_reference"
                                required
                            />
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="action-form">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" 
                                    class="btn btn-info waves-effect waves-light">Save</button>
                                <a type="submit" 
                                    class="btn btn-dark waves-effect waves-light"
                                    href="{{ route('relations.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection