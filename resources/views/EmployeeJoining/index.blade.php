@extends('Layouts.app')

@section('content')
<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered table-sm table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Signed</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employeeJoinings as $joining)
                <tr>
                    <td>
                        <a href="#">
                            {{ $joining->full_name }}
                        </a>
                    </td>
                    <td>{{ $joining->mobile_no }}</td>
                    <td>{{ $joining->mobile_no }}</td>
                    <td>{{ $joining->mobile_no }}</td>
                    <td>{{ $joining->mobile_no }}</td>
                    <td>
                        Edit
                        /
                        Delete
                        /
                        <a href="{{ route('onboardings.preview', $joining) }}" target="about:blank">
                        Preview
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="7">
                        <a type="button" class="btn btn-info btn-rounded" href="{{ route('onboardings.create') }}">Create Onboarding</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
