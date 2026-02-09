    @extends('Layouts.app')

    @section('content')
    @php
        $currentUser = auth()->user();
    @endphp
        <div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title m-t-40">User Info</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="390">User Name</td>
                                    <td> {{ $user->name }} </td>
                                </tr>
                                <tr>
                                    <td>Registered Email</td>
                                    <td> {{ $user->email }} </td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td> {{ $user->role->name }} </td>
                                </tr>
                                <tr>
                                    <td>Role Code</td>
                                    <td> {{ $user->role->slug }} </td>
                                </tr>
                                <tr>
                                    <td>Role Level</td>
                                    <td> {{ $user->role->level }} </td>
                                </tr>
                                <tr>
                                    <td>Access Permission</td>
                                    <td> {{ $user->role->permission }} </td>
                                </tr>
                                <tr>
                                    <td>Is Active User</td>
                                    <td> {{ $user->is_active ? "Yes" : "No" }} </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        @if ($currentUser->is_su ||
                                            (
                                                $currentUser->role &&
                                                $user->role &&
                                                $currentUser->role->level > $user->role->level
                                            )
                                        )
                                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('users.edit', $user) }}">Edit</a>
                                        @endif
                                        <a type="button" class="btn btn-secondary btn-rounded" href="{{ route('users.index') }}">Back</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection