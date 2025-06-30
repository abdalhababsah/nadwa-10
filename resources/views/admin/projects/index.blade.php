@extends('admin.layout.mainlayout')

@section('content')
 <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Projects Table</h6>
                        <div class="d-flex align-items-center">
                            <form method="GET" action="{{ url('admin/projects') }}" class="me-2 mb-3">
                                <select name="category" class="form-select" onchange="this.form.submit()">
                                    <option value="">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" 
                                        @selected(request('category') == $category->value)
                                        >
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                            <a class="btn btn-primary me-2" href="{{ url('admin/projects/create') }}">
                                Add Project
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <table class="table align-items-center mb-0" id="table">
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
                                <tbody id="tableBodyContents">
                                    @foreach ($projects as $work)
                                        <tr class="tableRow" data-id="{{ $work->id }}">
                                            <td>{{ $work->id }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $work->image_path) }}"
                                                    alt="{{ $work->title }}" class="img-thumbnail" style="width: 100px;">
                                            </td>
                                            <td>{{ $work->category }}</td>
                                            <td>{{ $work->title }}</td>
                                            <td>{{ substr($work->description, 0, 100) }}</td>
                                            <td class="text-center">
                                                <a href="{{url('/admin/projects', $work)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.projects.destroy', $work->id) }}"
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
                                {{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <!-- jQuery UI CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- DataTables JS CDN Link -->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <!-- DataTables JS ( includes Bootstrap 5 for design [UI] ) CDN Link -->
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{url('backend/assets/js/update-order.js')}}"></script>

    <script type="text/javascript"></script>

@endpush