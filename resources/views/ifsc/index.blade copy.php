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
                        <form class="row g-3" novalidate method="POST" action="{{ route('ifsc.index-q') }}">
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
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataSet as $key => $item)
                                    <tr>
                                        <th scope="row">
                                            {{ $key + $dataSet->firstItem() }}
                                        </th>
                                        <td>
                                            <a href="#"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit {{ $item->ifsc }}">
                                                {{ $item->ifsc }}
                                            </a>
                                        </td>
                                        <td>{{ $item->bank }}</td>
                                        <td>{{ $item->branch }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-danger rounded-pill"
                                                onclick="event.preventDefault();
                                                    if(confirm('Delete {{ $item->ifsc }}?')) {
                                                        getElementById('delFrm{{ $item->id }}').submit();
                                                    }"
                                                >
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form action="{{ route('ifsc.destroy', $item->id) }}"
                                                method="POST"
                                                id="delFrm{{ $item->id }}"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE');
                                            </form>
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

                <!-- Modal -->
                <div class="modal fade"
                    id="deleteModal"
                    tabindex="-1"
                    aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="#" id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h1><i class="bi bi-exclamation-triangle text-warning">Warning</i></h1>
                                </div>
                                <div class="modal-body">
                                    <h1 class="modal-title fs-5 text-danger text-center" id="modalLabel"></h1>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Confirm Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>

<script type="text/javascript">
    function populateModal(itemName, formAction) {
        document.getElementById('modalLabel').innerHTML = 'Delete '+ itemName + "?"
        document.getElementById('deleteForm').action = formAction;
    }
</script>
@endsection
