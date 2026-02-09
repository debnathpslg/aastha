@extends('Layouts.app')

@section('content')
    <div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 class="box-title m-t-40">Role Info</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="390">Item Code</td>
                                <td> {{ $role->slug }} </td>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td> {{ $role->name }} </td>
                            </tr>
                            <tr>
                                <td>Item Level</td>
                                <td> {{ $role->level }} </td>
                            </tr>
                            <tr>
                                <td>Access Permission</td>
                                <td> {{ $role->permission }} </td>
                            </tr>
                            <tr>
                                <td>Item </td>
                                <td> {{ $role->is_system ? 'Yes' : 'No' }} </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    @if (!$role->is_system)
                                    {{-- <a type="button" class="btn btn-info btn-rounded" href="{{ route('roles.edit', $role) }}">Edit</a> --}}
                                    @endif
                                    <a type="button" class="btn btn-secondary btn-rounded" href="{{ route('roles.index') }}">Back</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection