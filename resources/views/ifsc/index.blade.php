@extends('main')

@section('content')
<div class="pagetitle">
    <h1>IFSC Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">IFSC</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <span class="float-start">
                            <h4>Filter IFSC</h4>
                        </span>
                        <span class="float-end">
                            <a href="#" class="btn btn-sm btn-outline-primary">Create New IFSC</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" novalidate method="GET" action="{{ route('ifsc.index') }}">
                            @csrf
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search IFSC" name="q" value="{{ $q }}">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span class="float-start">
                            <h4>List of Bank IFSC</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">IFSC</th>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Branch</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataSet as $key => $item)
                                    <tr>
                                        <th scope="col">
                                            {{ $key + $dataSet->firstItem() }}
                                        </th>
                                        <td>
                                            {{ $item->ifsc }}
                                        </td>
                                        <td>
                                            {{ $item->bank }}
                                        </td>
                                        <td>
                                            {{ $item->branch }}
                                        </td>
                                        <td>
                                            {{ $item->state }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-danger rounded-pill"
                                                >
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        @if ($dataSet || count($dataSet) > 0)
                        {{ $dataSet->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>
@endsection
