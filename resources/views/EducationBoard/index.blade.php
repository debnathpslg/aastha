@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Edu. Board</th>
                    <th>Is System Board</th>
                    <th>Deleted Board</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($boards as $board)
                <tr>
                    <td class="text-center">
                        <a href="{{ $board->trashed() ? '#' : route('boards.show', $board) }}">
                            {{ $board->name }}
                        </a>
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $board->is_system ? 'text-warning' : 'text-info' }}"></i>
                        {{ $board->is_system ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $board->trashed() ? 'text-danger' : 'text-success' }}"></i>
                        {{ $board->trashed() ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        @if (!$board->is_system)
                            @if (!$board->deleted_at)
                                <a href="{{ route('boards.edit', $board) }}" 
                                    class="btn btn-outline-primary">
                                    Edit
                                </a>
                                
                                <form action="{{ route('boards.destroy', $board) }}" 
                                    method="POST" 
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" 
                                        onclick="return confirm('Are you sure?')"
                                        class="btn btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('boards.restore', $board->id) }}" 
                                    method="POST" 
                                    style="display:inline">
                                    @csrf

                                    <button type="submit" 
                                        onclick="return confirm('Are you sure?')"
                                        class="btn btn-outline-secondary">
                                        Restore
                                    </button>
                                </form>
                            @endif
                        @else
                            --/--
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="7">
                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('boards.create') }}">Add New Board</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection