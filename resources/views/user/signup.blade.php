@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-4"></div>
            <div class="col-4 shadow p-3 mb-5 bg-body rounded">
                <h2 style="text-align: center;">Register User</h2>
                <hr />
                <form action="{{route('submitRegInfo')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_name">Name *</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" maxlength="50"  value="{{old('user_name')}}">
                        @error('user_name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="user_email">Email address *</label>
                        <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email" maxlength="50"  value="{{old('user_email')}}" >
                        @error('user_email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="user_mobile">Mobile *</label>
                        <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Mobile" maxlength="10"  value="{{old('user_mobile')}}" >
                        @error('user_mobile')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" maxlength="20">
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="conf_password">Retype Password *</label>
                        <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm Password" maxlength="20">
                        @error('conf_password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_id">Employee Id</label>
                        <input type="password" class="form-control" id="emp_id" name="emp_id" placeholder="Employee Id" maxlength="10"  value="{{old('emp_id')}}" >
                        @error('emp_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    @error('other_msg')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <div class="mb-3 text-center">
                    <a href="{{route('loginPage')}}" class="link-primary">Alreaday Registered? Click here to Login.</a>
                </div>
            </div>
        </div>
    </div>
@endsection