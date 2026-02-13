@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Document</th>
                    <th>Uploaded File</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($propDocTypes as $docType)
                    <tr>
                        <td>
                            {{ $docType->name }}
                        </td>

                        <td>
                            @if ($docType->propDocument === null)
                                No file uploaded
                            @else
                                <a href="{{ asset('storage/'.$docType->propDocument->uploadedPropDoc->file_path) }}" target="_blank">
                                    {{ $docType->propDocument->uploadedPropDoc->file_name }}
                                </a>
                                <br />
                            @endif
                        </td>

                        <td>
                            {{-- {{ ($doc->updated_at ? $doc->updated_at : $doc->created_at)->format('d-m-Y') }} --}}
                            @if ($docType->propDocument === null)
                                --
                            @else
                                {{ ($docType->propDocument->updated_at)->format('d-m-Y') }} <br />
                            @endif
                        </td>

                        <td class="text-center">
                            @if ($docType->propDocument === null)
                                -- / --
                            @else
                                <a href="{{ route('prop_uploads.edit', ['prop_upload' => $docType->propDocument->id]) }}" class="btn btn-outline-secondary">Edit</a>
                                <form action="{{ route('prop_uploads.destroy', ['prop_upload' => $docType->propDocument->id]) }}" 
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
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="7">
                        <a type="button" class="btn btn-info btn-rounded" 
                            href="{{ route('prop_uploads.create') }}">New Upload</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection