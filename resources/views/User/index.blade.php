@extends('Layouts.app')

@section('content')
@php
    $currentUser = auth()->user();
@endphp
    <div>
        <div class="table-responsive">
            {{-- @dd($users) --}}
            <table id="zero_config" class="table table-bordered table-sm table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>User Name</th>
                        <th>Registered Email</th>
                        <th>Role</th>
                        <th>Role Code</th>
                        <th>Role Level</th>
                        <th>Access Permission</th>
                        <th>Is Active User</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('users.show', $user) }}">
                            {{ $user->name }}
                            </a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->role->slug }}</td>
                        <td>{{ $user->role->level }}</td>
                        <td>{{ $user->role->permission }}</td>
                        <td>{{ $user->is_active ? "Yes" : "No" }}</td>

                        <td class="text-center">
                        @if ($currentUser->is_su ||
                            (
                                $currentUser->role &&
                                $user->role &&
                                $currentUser->role->level > $user->role->level
                            )
                        )
                            <a href="{{ route('users.edit', $user) }}">Edit</a>
                            <span> / </span>
                                @if(!$user->is_su)
                                    <a href="{{ route('users.destroy', $user) }}" as="button">Delete</a>
                                @endif
                                <form
                                    action="{{ route('users.reset-password', $user) }}"
                                    method="POST"
                                    style="display:inline"
                                >
                                    @csrf
                                    <button class="btn btn-warning btn-sm">
                                        Reset Password
                                    </button>
                                </form>
                            @else
                            --/--
                            @endif
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <a type="button" class="btn btn-info btn-rounded" href="{{ route('users.create') }}">Add New User</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection