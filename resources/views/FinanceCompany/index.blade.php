@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Company Name</th>
                    <th>Code</th>
                    <th>Is System Company</th>
                    <th>Deleted Company</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td class="text-center">
                        <a href="{{ $company->trashed() ? '#' : route('companies.show', $company) }}">
                            {{ $company->name }}
                        </a>
                    </td>

                    <td class="text-center">{{ $company->slug }}</td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $company->is_system ? 'text-warning' : 'text-info' }}"></i>
                        {{ $company->is_system ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        <i class="m-r-10 mdi mdi-checkbox-blank-circle {{ $company->trashed() ? 'text-danger' : 'text-success' }}"></i>
                        {{ $company->trashed() ? "Yes" : "No" }}
                    </td>

                    <td class="text-center">
                        @if (!$company->is_system)
                            @if (!$company->deleted_at)
                                <a href="{{ route('companies.edit', $company) }}" 
                                    class="btn btn-outline-primary">
                                    Edit
                                </a>
                                
                                <form action="{{ route('companies.destroy', $company) }}" 
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
                                <form action="{{ route('companies.restore', $company->id) }}" 
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
                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('companies.create') }}">Add New Company</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection