@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-4"></div>
            <div class="col-4 shadow p-3 mb-5 bg-body rounded">
                <h2 style="text-align: center;">User Modification</h2>
                <hr />
                <form action="{{route('submitEditUser')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_role">User Role</label>
                        <select name="user_role" id="user_role" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{$role->role_id}}" {{($user->user_role == $role->role_id)? "selected": ""}}>{{$role->role_description}}</option>
                            @endforeach
                        </select>
                        @error('user_role')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="location_id">User Location</label>
                        <select name="location_id" id="location_id" class="form-control">
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}" {{($user->location_id == $location->id)? "selected" : ""}}>{{$location->location_name}}</option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <input type="hidden" value="{{$callingMethod}}" name="callingMethod">
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection