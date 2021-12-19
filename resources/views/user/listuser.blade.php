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
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th colspan="8" style="text-align: center;"><h1>{{$title}}</h1></th>
                        </tr>
                        <tr>
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
                            <td>{{$user->unm}}</td>
                            <td>{{$user->ueml}}</td>
                            <td>{{$user->umob}}</td>
                            <td style="text-align: center;">{{$user->rld}}</td>
                            <td style="text-align: center;">{{$user->lnm}}</td>
                            <td style="text-align: center;">
                                @if ($user->act)
                                    <a href="#">
                                        <button class="btn btn-success rounded-pill shadow" data-toggle="tooltip" data-placement="top" title="Restrict User">Yes</button>
                                    </a>
                                @else
                                    <a href="#">
                                        <button class="btn btn-danger rounded-pill shadow" data-toggle="tooltip" data-placement="top" title="Authorise User">No</button>
                                    </a>
                                @endif
                            <td style="text-align: center;">{{!($user->llg) ? "---" : $user->llg}}</td>
                            <td>
                                {{-- <span class="glyphicon glyphicon-ok"></span>&nbsp; --}}
                                <a href="#">
                                    <i class="bi-pencil-square btn btn-primary" style="font-size: 1rem; color: white; text-decoration: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit user"></i>
                                </a>
                                <a href="#">
                                    <i class="bi-unlock btn btn-success" style="font-size: 1rem; color: white; text-decoration: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password"></i>
                                </a>
                                <a href="#">
                                    <i class="bi-trash btn btn-danger" style="font-size: 1rem; color: white; text-decoration: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection