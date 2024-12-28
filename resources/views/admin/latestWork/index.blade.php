@extends('admin.layout.mainlayout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Latest Works Table</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLatestWorkModal">Add Latest
                            Work</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestWorks as $work)
                                        <tr>
                                            <td>{{ $work->id }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $work->image_path) }}"
                                                    alt="{{ $work->title }}" class="img-thumbnail" style="width: 100px;">
                                            </td>
                                            <td>{{ ucfirst($work->category) }}</td>
                                            <td>{{ $work->title }}</td>
                                            <td>{{ $work->description }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editLatestWorkModal"
                                                    onclick="editLatestWork({{ $work }})">Edit</button>
                                                <form action="{{ route('admin.latest-works.destroy', $work->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between my-4">
                                {{ $latestWorks->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Latest Work Modal -->
    <div class="modal fade" id="addLatestWorkModal" tabindex="-1" aria-labelledby="addLatestWorkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.latest-works.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLatestWorkModalLabel">Add Latest Work</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="interior">Interior</option>
                                <option value="exterior">Exterior</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Latest Work Modal -->
    <div class="modal fade" id="editLatestWorkModal" tabindex="-1" aria-labelledby="editLatestWorkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="editLatestWorkForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLatestWorkModalLabel">Edit Latest Work</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <select name="category" id="editCategory" class="form-control" required>
                                <option value="interior">Interior</option>
                                <option value="exterior">Exterior</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="editImage" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <img id="currentImage" src="" alt="Current Image" class="img-thumbnail"
                                style="width: 100px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editLatestWork(work) {
            const form = document.getElementById('editLatestWorkForm');
            form.action = `latest-works/${work.id}`;
            document.getElementById('editCategory').value = work.category;
            document.getElementById('editTitle').value = work.title;
            document.getElementById('editDescription').value = work.description;
            document.getElementById('currentImage').src = `/storage/${work.image_path}`;
        }
    </script>
@endsection
