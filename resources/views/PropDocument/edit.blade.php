@extends('Layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Agreement Uploads Alteration Form</h4>
            </div>

            <br />

            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Company Name</th>
                            <th>Code</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td rowspan="{{ $agreement->uploadedAgreements->count() + 1 }}"
                                class="text-center align-middle"
                                >
                                {{ $agreement->company->name }}
                            </td>

                            <td rowspan="{{ $agreement->uploadedAgreements->count() + 1 }}"
                                class="text-center align-middle"
                                >
                                {{ $agreement->company->slug }}
                            </td>

                            @if ($agreement->uploadedAgreements->isNotEmpty())
                                <th class="bg-secondary text-white">Uploaded Agreements</th>
                                <th class="bg-secondary text-white">Upload Date</th>
                                <th class="bg-secondary text-white">Action</th>
                            @else
                                <th class="text-center">No Upload(s)</th>
                            @endif
                        </tr>

                        {{-- @dd($agreement) --}}

                        @if ($agreement->uploadedAgreements->isNotEmpty())
                            @foreach ($agreement->uploadedAgreements as $upload)
                                <tr>
                                    <td>{{ $upload->file_name }}</td>
                                    <td>{{ ($upload->updated_at ? $upload->updated_at : $upload->created_at)->format("d-m-Y") }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('agreements.destroyFromEdit', [
                                            'doc' => $upload, 
                                            'agreement' => $agreement]) }}" 
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
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <a type="button" class="btn btn-info btn-rounded" 
                                    href="{{ route('agreements.createFromEdit', $agreement) }}">New Upload</a>
                                <a type="button" class="btn btn-secondary btn-rounded" 
                                    href="{{ route('agreements.index') }}">Cancel</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            {{-- <form method="POST" 
                action="{{ route('agreements.destroy', $agreement->uploadedAgreements->id) }}" 
                class="row g-3 m-2" 
                enctype="multipart/form-data"
                novalidate>
                @csrf
                @method('DELETE')

            </form> --}}
        </div>
    </div>
</div>
@endsection