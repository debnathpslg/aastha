@extends('layouts.master')

@section('content')
    <div class="shadow p-3 m-3 bg-body rounded" style="margin-top: 2em; padding: 2em;">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" action="{{route('searchEmp')}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="searchitem" name="searchitem" placeholder="Search Name, Email, Mobile etc." aria-describedby="search">
                        <button type="submit" class="btn btn-primary" id="search">Search</button>
                    </div>
                    <input type="hidden" name="callingMethod" id="callingMethod" value="{{strtolower($callingMethod)}}">
                </form>
            </div>
        </div>
    </div>
    <div class="shadow p-3 m-3 bg-body rounded" style="margin-top: 2em;">     
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th colspan="13" style="text-align: center;"><h1>{{$title}}</h1></th>
                        </tr>
                        <tr>
                            <th>Emp. Id</th>
                            <th>Location</th>
                            <th>Designation</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>A/c Holder</th>
                            <th>Relation</th>
                            <th>A/c No.</th>
                            <th>Bank</th>
                            <th>Branch</th>
                            <th>IFSC</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                        <tr>
                            <td><a href="{{route('editEmpData',['id'=>$emp->id,'callingMethod'=>$callingMethod])}}"><span style="font-weight: bold;">{{$emp->eid}}</span></a></td>
                            <td>{{$emp->eloc}}</td>
                            <td>{{$emp->edesig}}</td>
                            <td>{{$emp->ename}}</td>
                            <td>{{$emp->eemail}}</td>
                            <td>{{$emp->emob}}</td>
                            <td>{{$emp->eahname}}</td>
                            <td>{{$emp->erel}}</td>
                            <td>{{str_replace("'","",$emp->eacno)}}</td>
                            <td>{{$emp->ebank}}</td>
                            <td>{{$emp->ebranch}}</td>
                            <td>{{$emp->eifsc}}</td>
                            <td>---</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection