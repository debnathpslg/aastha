@extends('Layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Uploade Agreement</h4>
            </div>

            <form method="POST" 
                action="{{ route('agreements.storeFromEdit', $agreement) }}" 
                class="row g-3 m-2" 
                enctype="multipart/form-data"
                novalidate>
                @csrf

                <div class="form-body col-md-12">
                    <div class="card-body">
                        <div class="row p-t-20">
                            <div class="col-md-3">Upload Agreement</div>
                            <div class="col-md-9">
                                <input
                                    type="file"
                                    name="document[file]"
                                    class="form-control"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="action-form">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                <a type="submit" 
                                    class="btn btn-dark waves-effect waves-light"
                                    href="{{ route('agreements.edit', $agreement) }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection