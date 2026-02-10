@extends('Layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3 class="box-title m-t-40">Language Info</h3>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="390">Language</td>
                            <td> {{ $language->name }} </td>
                        </tr>

                        <tr>
                            <td width="390">Is System Language</td>
                            <td>{{ $language->is_system ? "Yes" : "No" }}</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                @if (!$language->is_system)
                                <a type="button" 
                                    class="btn btn-info btn-rounded" 
                                    href="{{ route('languages.edit', $language) }}">Edit</a>
                                @endif
                                <a type="button" 
                                    class="btn btn-secondary btn-rounded" 
                                    href="{{ route('languages.index') }}">Back</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection