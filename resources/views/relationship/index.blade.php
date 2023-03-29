@extends('main')

@section('content')
<div class="pagetitle">
    <h1>Relationship Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Relationships</li>
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
                            <h4>List of Relationships</h4>
                        </span>
                        <span class="float-end">
                            <a href="{{ route('relationship.create') }}" class="btn btn-sm btn-outline-primary">Create New Relationship</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-responsive text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Relationship Name</th>
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
                                            <a href="{{ route('relationship.edit', $item->id) }}"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit {{ $item->name }}">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm rounded-pill btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                onclick="event.preventDefault(); populateModal('{{ $item->name }}', '{{ route('relationship.destroy', $item->id) }}');"
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
