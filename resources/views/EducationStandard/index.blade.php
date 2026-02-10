@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Standard</th>
                    <th>Is System Standard</th>
                    <th>Deleted Standard</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($standards as $standard)
                <tr>
                    <td class="text-center">
                        <a href="{{ $standard->trashed() ? '#' : route('standards.show', $standard) }}">
                            {{ $standard->name }}
                        </a>
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $standard->is_system ? 'text-warning' : 'text-info' }}"></i>
                        {{ $standard->is_system ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $standard->trashed() ? 'text-danger' : 'text-success' }}"></i>
                        {{ $standard->trashed() ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        @if (!$standard->is_system)
                            @if (!$standard->deleted_at)
                                <a href="{{ route('standards.edit', $standard) }}" 
                                    class="btn btn-outline-primary">
                                    Edit
                                </a>
                                
                                <form action="{{ route('standards.destroy', $standard) }}" 
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
                                <form action="{{ route('standards.restore', $standard->id) }}" 
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
                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('standards.create') }}">Add New Standard</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection