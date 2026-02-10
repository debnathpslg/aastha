@extends('Layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Education Board Creation Form</h4>
            </div>

            <form method="POST" action="{{ route('boards.store') }}" class="row g-3 m-2" novalidate>
                @csrf

                <div class="card-body col-md-12">
                    <h4 class="card-title">Education Board Info</h4>
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
                                colSpan='col-md-12'
                                type="text"
                                name="board"
                                labelCaption="Edu. Board"
                                extraClass="text-capitalize"
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
                                    href="{{ route('boards.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection