@extends('Layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3 class="box-title m-t-40">Finance Company Info</h3>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="390">Finance Company</td>
                            <td> {{ $company->name }} </td>
                        </tr>

                        <tr>
                            <td width="390">Code</td>
                            <td> {{ $company->slug }} </td>
                        </tr>

                        <tr>
                            <td width="390">Is System Company</td>
                            <td>{{ $company->is_system ? "Yes" : "No" }}</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                @if (!$company->is_system)
                                <a type="button" 
                                    class="btn btn-info btn-rounded" 
                                    href="{{ route('companies.edit', $company) }}">Edit</a>
                                @endif
                                <a type="button" 
                                    class="btn btn-secondary btn-rounded" 
                                    href="{{ route('companies.index') }}">Back</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection