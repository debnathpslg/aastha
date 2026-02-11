@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Document Type</th>
                    <th>Is System Doc. Type</th>
                    <th>Deleted Doc Type</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pdoctypes as $pdoctype)
                <tr>
                    <td class="text-center">
                        <a href="{{ $pdoctype->trashed() ? '#' : route('pdoctypes.show', $pdoctype) }}">
                            {{ $pdoctype->name }}
                        </a>
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $pdoctype->is_system ? 'text-warning' : 'text-info' }}"></i>
                        {{ $pdoctype->is_system ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $pdoctype->trashed() ? 'text-danger' : 'text-success' }}"></i>
                        {{ $pdoctype->trashed() ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        @if (!$pdoctype->is_system)
                            @if (!$pdoctype->deleted_at)
                                <a href="{{ route('pdoctypes.edit', $pdoctype) }}" 
                                    class="btn btn-outline-primary">
                                    Edit
                                </a>
                                
                                <form action="{{ route('pdoctypes.destroy', $pdoctype) }}" 
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
                                <form action="{{ route('pdoctypes.restore', $pdoctype->id) }}" 
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
                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('pdoctypes.create') }}">Add New Doc Type</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection