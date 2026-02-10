@extends('Layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3 class="box-title m-t-40">Relation Info</h3>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="390">Relation</td>
                            <td> {{ $relation->name }} </td>
                        </tr>

                        <tr>
                            <td width="390">Is Applicable for Beneficiary</td>
                            <td>{{ $relation->is_valid_beneficiary ? "Yes" : "No" }}</td>
                        </tr>

                        <tr>
                            <td width="390">Is Applicable for Reference</td>
                            <td>{{ $relation->is_valid_reference ? "Yes" : "No" }}</td>
                        </tr>

                        <tr>
                            <td width="390">Is System Relation</td>
                            <td>{{ $relation->is_system ? "Yes" : "No" }}</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                @if (!$relation->is_system)
                                <a type="button" 
                                    class="btn btn-info btn-rounded" 
                                    href="{{ route('relations.edit', $relation) }}">Edit</a>
                                @endif
                                <a type="button" 
                                    class="btn btn-secondary btn-rounded" 
                                    href="{{ route('relations.index') }}">Back</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection