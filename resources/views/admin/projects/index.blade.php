@extends('admin.layout.mainlayout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Projects Table</h6>
                        <a class="btn btn-primary" href="{{url('admin/projects/create')}}">
                           Add Project</a>
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
                                    @foreach ($projects as $work)
                                        <tr>
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
                                {{ $projects->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
