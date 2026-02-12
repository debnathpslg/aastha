@extends('Layouts.app')

@section('content')
    <div>
        <div class="table-responsive">
            <table id="zero_config" class="table table-bordered table-sm table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Role</th>
                        <th>Code</th>
                        <th>Level</th>
                        <th>Access Permission</th>
                        <th>Is System Role</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->slug }}</td>
                        <td class="text-center"><a href="{{ route('roles.show', $role) }}">{{ $role->name }}</a></td>
                        <td>{{ $role->level }}</td>
                        <td>{{ $role->permission }}</td>
                        <td>{{ $role->is_system ? "Yes" : "No" }}</td>

                        @if (!$role->is_system)
                        <td class="text-center">
                            {{-- <a href="{{ route('roles.edit', $role) }}">Edit</a> --}}--
                            <span> / </span>
                            {{-- <a href="{{ route('roles.destroy', $role) }}" as="button">Delete</a>--}}--
                        </td>
                        @else
                        <td class="text-center">--/--</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <td colspan="7">
                            <a type="button" class="btn btn-info btn-rounded" href="{{ route('roles.create') }}">Add New Role</a>
                        </td>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
    </div>
@endsection