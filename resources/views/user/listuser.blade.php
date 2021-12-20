@extends('layouts.master')

@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded" style="margin-top: 2em; padding: 2em;">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" action="{{route('searchAndListUser')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="searchitem" name="searchitem" placeholder="Search Name, Email, Mobile etc.">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    <input type="hidden" name="callingMethod" id="callingMethod" value="{{strtolower($callingMethod)}}">
                </form>
            </div>
        </div>
    </div>

    <div class="container shadow p-3 mb-5 bg-body rounded" style="margin-top: 2em;">     
        <div class="row">
            <div class="col-sm-12">
                @error('errMsg')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                @error('success')
                    <div class="alert alert-success">{{$message}}</div>
                @enderror
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th colspan="9" style="text-align: center;"><h1>{{$title}}</h1></th>
                        </tr>
                        <tr>
                            <th>Emp. Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th style="text-align: center;">Role</th>
                            <th style="text-align: center;">Location</th>
                            <th style="text-align: center;">Verified User</th>
                            <th style="text-align: center;">Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td><strong>{{$user->eid}}</strong></td>
                            <td>{{$user->unm}}</td>
                            <td>{{$user->ueml}}</td>
                            <td>{{$user->umob}}</td>
                            <td style="text-align: center;">{{$user->rld}}</td>
                            <td style="text-align: center;">{{$user->lnm}}</td>
                            <td style="text-align: center;">
                                <a href="{{route('verifyUser',['id'=>$user->uid, 'callingMethod'=>strtolower($callingMethod)])}}">
                                @if ($user->act)
                                    <button class="btn btn-success rounded-pill shadow" data-toggle="tooltip" data-placement="top" title="Restrict User">Yes</button>
                                @else
                                    <button class="btn btn-danger rounded-pill shadow" data-toggle="tooltip" data-placement="top" title="Authorise User">No</button>
                                @endif
                                </a>
                            <td style="text-align: center;">{{!($user->llg) ? "---" : $user->llg}}</td>
                            <td>
                                <a href="{{route('editUser',['id'=>$user->uid, 'callingMethod'=>strtolower($callingMethod)])}}">
                                    <i class="bi-pencil-square btn btn-outline-primary" style="{font-size: 1rem; color: blue; text-decoration: none;} :hover {color: white;}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit user"></i>
                                </a>
                                <a href="{{route('resetUserPassword',['id'=>$user->uid, 'callingMethod'=>strtolower($callingMethod)])}}">
                                    <i class="bi-unlock btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password" style="{font-size: 1rem; color: blue; text-decoration: none;} :hover {color: white;}"></i>
                                </a>
                                <a href="{{route('deleteOneUser',['id'=>$user->uid, 'callingMethod'=>strtolower($callingMethod)])}}">
                                    <i class="bi-trash btn btn-outline-danger" style="{font-size: 1rem; color: red; text-decoration: none;} :hover {color: white;}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection