@extends('Layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Create New User</h4>
                </div>

                <form method="POST" action="{{ route('users.store') }}" class="row g-3 m-2" novalidate>
                    @csrf

                    <div class="card-body col-md-12">
                        <h4 class="card-title">User Info</h4>
                    </div>
                    <hr>
                    <div class="form-body col-md-12">
                        <div class="card-body">
                            <div class="row p-t-20">
                                {{-- Name --}}
                                <x-form.text-input 
                                    colSpan='col-md-4'
                                    type="text"
                                    name="name"
                                    labelCaption="Full Name"
                                    extraClass="text-capitalize"
                                    required
                                />

                                {{-- Email --}}
                                <x-form.text-input 
                                    colSpan='col-md-4'
                                    type="email"
                                    name="email"
                                    labelCaption="User Name/email"
                                    extraClass="text-losercase"
                                    required
                                />

                                {{-- Role --}}
                                <x-form.select-input
                                    colSpan='col-md-2'
                                    labelCaption="Role"
                                    name="role_id"
                                    :options="$roles"
                                    required
                                />

                                {{-- Active --}}
                                <x-form.select-input
                                    colSpan='col-md-2'
                                    labelCaption="Is Active"
                                    name="is_active"
                                    :options="['0' => 'No', '1' => 'Yes']"
                                    required
                                />
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="action-form">
                                <div class="form-group m-b-0 text-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                    <a type="submit" 
                                        class="btn btn-dark waves-effect waves-light"
                                        href="{{ route('users.index') }}">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection