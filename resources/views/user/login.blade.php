@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-4"></div>
            <div class="col-4">
                <h2 style="text-align: center;">User Login</h2>
                <hr />
                <form action="{{route('submitLoginInfo')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_email">Email address</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" maxlength="20">
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">{{$errors->first()}}</div>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="mb-3 text-center">
                    <a href="{{route('showRegisterPage')}}" class="link-primary">New User? Click here to Register.</a>
                </div>
            </div>
        </div>
    </div>
@endsection