@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Designations Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Designations</li>
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
                            <h4>List of Employee Designations</h4>
                        </span>
                        <span class="float-end">
                            <a href="{{ route('designation.create') }}" class="btn btn-sm btn-outline-primary">Create New Designation</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Designation Name</th>
                                        <th scope="col">Designation Short Name</th>
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
                                            <a href="{{ route('designation.edit', $item->id) }}"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit {{ $item->name }}">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td>{{ $item->short_name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-danger rounded-pill"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                onclick="event.preventDefault(); populateModal('{{ $item->name }}', '{{ route('designation.destroy', $item->id) }}');"
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
                        {{ $dataSet->links() }}
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
