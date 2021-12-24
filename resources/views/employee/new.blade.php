@extends('layouts.master')

@section('content')
    <div class="container shadow">
        <br>
        <form action="{{route('createNewEmployee')}}" method="POST">
            @csrf
            <div class="row justify-content-start">
                <div class="m-3">
                    <h2 style="text-align: center">Employee Creation Form</h2>
                    @error('success')
                        <div class="alert alert-success m-2">{{$message}}</div>
                    @enderror
                    @error('sqlError')
                        <div class="alert alert-danger m-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="emp_name">Employee Name</label>
                        <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Employee Name" maxlength="50"  value="{{old('emp_name')}}">
                        @error('emp_name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_location">Location</label>
                        <select class="form-control" name="emp_location" id="emp_location">
                            <option value="0" selected>Select Location</option>
                            @foreach ($locations as $loc)
                                <option value="{{$loc->id}}">{{$loc->location_name}}</option>
                            @endforeach
                        </select>
                        @error('emp_location')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_designation">Designation</label>
                        <select class="form-control" name="emp_designation" id="emp_designation">
                            <option value="0" selected>Select Designation</option>
                            @foreach ($designations as $desig)
                                <option value="{{$desig->id}}">{{$desig->designation}}</option>
                            @endforeach
                        </select>
                        @error('emp_designation')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_mobile">Mobile No</label>
                        <input type="text" class="form-control" id="emp_mobile" name="emp_mobile" placeholder="Mobile No." maxlength="10"  value="{{old('emp_mobile')}}">
                        @error('emp_mobile')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="emp_email">Email Id</label>
                        <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Email Id" maxlength="50"  value="{{old('emp_email')}}">
                        @error('emp_email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_ac_holder_name">Account Holder Name</label>
                        <input type="text" class="form-control" id="emp_ac_holder_name" name="emp_ac_holder_name" placeholder="Account Holder Name" maxlength="50"  value="{{old('emp_ac_holder_name')}}">
                        @error('emp_ac_holder_name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_relation">Relationship with A/c Holder</label>
                        <select class="form-control" name="emp_relation" id="emp_relation">
                            @foreach ($relations as $rel)
                                <option value="{{$rel->id}}" {{($rel->id==old('emp_relation') || ($rel->id==1)) ? 'selected' : ''}}>{{$rel->relation}}</option>
                            @endforeach
                        </select>
                        @error('emp_relation')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_account_no">Account No.</label>
                        <input type="password" class="form-control" id="emp_account_no" name="emp_account_no" placeholder="Account No" maxlength="50"  value="{{old('emp_account_no')}}">
                        @error('emp_account_no')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="conf_ac_no">Confirm A/c No.</label>
                        <input type="text" class="form-control" id="conf_ac_no" name="conf_ac_no" placeholder="Confirm Account No" maxlength="50"  value="{{old('conf_ac_no')}}">
                        @error('conf_ac_no')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_bank_name">Bank Name</label>
                        <input type="text" class="form-control" id="emp_bank_name" name="emp_bank_name" placeholder="Bank Name" maxlength="50"  value="{{old('emp_bank_name')}}">
                        @error('emp_bank_name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_bank_branch">Bank Branch</label>
                        <input type="text" class="form-control" id="emp_bank_branch" name="emp_bank_branch" placeholder="Branch Name" maxlength="50"  value="{{old('emp_bank_branch')}}">
                        @error('emp_bank_branch')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="emp_bank_ifsc">Bank IFSC</label>
                        <input type="text" class="form-control" id="emp_bank_ifsc" name="emp_bank_ifsc" placeholder="Bank IFSC" maxlength="11"  value="{{old('emp_bank_ifsc')}}">
                        @error('emp_bank_ifsc')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="m-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection