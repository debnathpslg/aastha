@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Company Name</th>
                    <th>Code</th>
                    <th>Agreements Uploaded</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($agreements as $agreement)
                    <tr>
                        <td>
                            {{ $agreement->company->name }}
                        </td>

                        <td>
                            {{ $agreement->company->slug }}
                        </td>

                        <td>
                            @if ($agreement->uploaded_agreements_count > 0)
                                <ul>
                                    @foreach ($agreement->uploadedAgreements as $uploads)
                                        <li>
                                            <a href="{{ asset('storage/'.$uploads->file_path) }}"
                                                target="_blank">
                                                {{ $uploads->file_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                Nill Upload
                            @endif
                        </td>

                        <td>
                            {{ ($agreement->updated_at ? $agreement->updated_at : $agreement->created_at)->format('d-m-Y') }}
                        </td>

                        <td class="text-center">
                            <a href="{{ route('agreements.edit', $agreement) }}" class="btn btn-outline-secondary">Edit</a>
                            @if ($agreement->uploadedAgreements->isEmpty())
                                <form action="{{ route('agreements.destroy', ['agreement' => $agreement]) }}" 
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
                            href="{{ route('agreements.create') }}">New Company</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection