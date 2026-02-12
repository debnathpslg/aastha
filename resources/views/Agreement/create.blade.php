@extends('Layouts.app')

@section('content')
@php
    $errorKey = str_replace(['[', ']'], ['.', ''], 'uploaded_agreement');
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Agreement Uploads Creation Form</h4>
            </div>

            <form method="POST" 
                action="{{ route('agreements.store') }}" 
                class="row g-3 m-2" 
                enctype="multipart/form-data"
                novalidate>
                @csrf

                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            <x-form.select-input 
                                colSpan='col-md-3'
                                labelCaption="Company"
                                name="company_id"
                                :options="$companies"
                                required
                            />

                            <div class="col-md-9">
                                <label for="uploaded_agreement">
                                    <span class="text-danger">*</span> Upload Agreement
                                </label>
                                <input type="file" 
                                    class="form-control {{ ($errors->has($errorKey) ? 'is-invalid' : '') }}"
                                    id="uploaded_agreement" 
                                    name="uploaded_agreement" 
                                    required
                                />
                                @error($errorKey)
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="action-form">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                <a type="submit" 
                                    class="btn btn-dark waves-effect waves-light"
                                    href="{{ route('agreements.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection