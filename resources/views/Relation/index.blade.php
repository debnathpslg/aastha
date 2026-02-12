@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Relation</th>
                    <th>Is Applicable for Beneficiary</th>
                    <th>Is Applicable for Reference</th>
                    <th>Is System Relation</th>
                    <th>Deleted Relation</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($relations as $relation)
                <tr>
                    <td class="text-center">
                        <a href="{{ $relation->trashed() ? '#' : route('relations.show', $relation) }}">
                            {{ $relation->name }}
                        </a>
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $relation->is_valid_beneficiary ? 'text-success' : 'text-danger' }}"></i>
                        {{ $relation->is_valid_beneficiary ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $relation->is_valid_reference ? 'text-success' : 'text-danger' }}"></i>
                        {{ $relation->is_valid_reference ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $relation->is_system ? 'text-warning' : 'text-info' }}"></i>
                        {{ $relation->is_system ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $relation->trashed() ? 'text-danger' : 'text-success' }}"></i>
                        {{ $relation->trashed() ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        @if (!$relation->is_system)
                            @if (!$relation->deleted_at)
                                <a href="{{ route('relations.edit', $relation) }}" 
                                    class="btn btn-outline-primary">
                                    Edit
                                </a>
                                
                                <form action="{{ route('relations.destroy', $relation) }}" 
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
                                <form action="{{ route('relations.restore', $relation->id) }}" 
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
                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('relations.create') }}">Add New Relation</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection