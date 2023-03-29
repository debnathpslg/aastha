@extends('main')

@section('content')

<div class="pagetitle">
    <h1>User Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="card mb-3">
                    <div class="card-header">
                        <span class="float-start">
                            <h4>List of Active Users</h4>
                        </span>
                        <span class="float-end">
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Create New User</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Controled Locations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activeUsers as $key => $item)
                                    <tr class="align-middle">
                                        <th scope="row">
                                            {{ $key + $activeUsers->firstItem() }}
                                        </th>
                                        <td>
                                            <a href="{{ route('user.show', $item->id) }}"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="View Details">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('user.edit', $item->id) }}" class="btn rounded-pill btn-primary btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="" class="btn rounded-pill btn-warning btn-sm">
                                                <i class="bi bi-key"></i>
                                            </a> --}}
                                            <a href="#" class="btn rounded-pill btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#toggleUserModal"
                                                onclick="event.preventDefault(); populateModal('{{ $item->name }}', '{{ route('user.destroy', $item->id) }}', 'Deactivate');"
                                                >
                                                <i class="bi bi-person-fill-x"></i>
                                            </a>
                                        </td>
                                        <td>
                                            {{ $item->role->name }}
                                        </td>
                                        <td>
                                            @if ($item->location->count() > 0)
                                            @foreach ($item->location as $location)
                                            <span class="badge badge-sm rounded-pill text-bg-success">
                                                {{ $location->short_name }}
                                            </span>
                                            @endforeach
                                            @else
                                            <span class="badge badge-sm rounded-pill text-bg-warning">
                                                None
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        {{ $activeUsers->links() }}
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <span class="float-start">
                            <h4 class="text-danger">List of Deactive Users</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Deactive User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Controled Locations</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deactiveUsers as $key => $item)
                                    <tr class="align-middle">
                                        <th scope="row">
                                            {{ $key + $deactiveUsers->firstItem() }}
                                        </th>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td>
                                            {{ $item->role->name }}
                                        </td>
                                        <td>
                                            @if ($item->location->count() > 0)
                                            @foreach ($item->location as $location)
                                            <span class="badge badge-sm rounded-pill text-bg-warning">
                                                {{ $location->short_name }}
                                            </span>
                                            @endforeach
                                            @else
                                            <span class="badge badge-sm rounded-pill text-bg-danger">
                                                None
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn rounded-pill btn-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#toggleUserModal"
                                                onclick="event.preventDefault(); populateModal('{{ $item->name }}', '{{ route('user.destroy', $item->id) }}', 'Activate');"
                                                >
                                                <i class="bi bi-person-fill-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        {{ $deactiveUsers->links() }}
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade"
                    id="toggleUserModal"
                    tabindex="-1"
                    aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="#" id="toggleUserForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h1><i class="bi bi-exclamation-triangle text-warning">Warning</i></h1>
                                </div>
                                <div class="modal-body">
                                    <h1 class="modal-title fs-5 text-danger text-center" id="modalLabel"></h1>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" class="btn btn-danger">Confirm</button>
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
    function populateModal(name, formAction, activation) {
        document.getElementById('modalLabel').innerHTML = activation + ' ' + name + "?"
        document.getElementById('toggleUserForm').action = formAction;
    }
</script>

@endsection
