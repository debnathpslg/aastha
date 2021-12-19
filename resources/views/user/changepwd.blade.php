@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-4"></div>
            <div class="col-4">
                <h2 style="text-align: center;">Password Reset</h2>
                <hr />
                <form action="{{route('submitActiveUserPasswordChangeForm')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" maxlength="20">
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="conf_password">Retype Password</label>
                        <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm Password" maxlength="20"   >
                        @error('conf_password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection