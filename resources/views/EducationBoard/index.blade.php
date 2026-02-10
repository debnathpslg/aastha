@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Language</th>
                    <th>Is System Language</th>
                    <th>Deleted Language</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($languages as $language)
                <tr>
                    <td class="text-center">
                        <a href="{{ $language->trashed() ? '#' : route('languages.show', $language) }}">
                            {{ $language->name }}
                        </a>
                    </td>

                    <td class="{{ $language->is_system ? 'bg-warning' : 'bg-info' }} text-white text-center">
                        {{ $language->is_system ? "Yes" : "No" }}
                    </td>

                    <td class="{{ $language->trashed() ? 'bg-danger' : 'bg-success' }} text-white text-center">
                        {{ $language->trashed() ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        @if (!$language->is_system)
                            @if (!$language->deleted_at)
                                <a href="{{ route('languages.edit', $language) }}" 
                                    class="btn btn-outline-primary">
                                    Edit
                                </a>
                                
                                <form action="{{ route('languages.destroy', $language) }}" 
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
                                <form action="{{ route('languages.restore', $language->id) }}" 
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
                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('languages.create') }}">Add New Language</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection