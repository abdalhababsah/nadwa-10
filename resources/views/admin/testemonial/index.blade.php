@extends('admin.layout.mainlayout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Testemonials Table</h6>
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
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Body</th>
                                        <th>Accept</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testemonials as $testemonial)
                                        <tr>
                                            <td>{{ $testemonial->id }}</td>
                                            <td>{{ ucfirst($testemonial->name) }}</td>
                                            <td>
                                                <img src="{{ isset($testemonial->image)? asset('storage/' . $testemonial->image): asset('assets/images/default.jpg') }}"
                                                    alt="{{ $testemonial->name }}" class="img-thumbnail" style="width: 75px;">
                                            </td>
                                            <td>
                                                <span 
                                                    data-bs-toggle="tooltip" 
                                                    data-bs-placement="top" 
                                                    title="{{ $testemonial->body }}"
                                                    style="cursor: pointer;"
                                                >
                                                    {{ Str::limit($testemonial->body, 60) }}
                                                </span>
                                            </td>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                    tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                        return new bootstrap.Tooltip(tooltipTriggerEl)
                                                    })
                                                });
                                            </script>
                                            <td>
                                                @if (is_null($testemonial->is_accepted))                                                
                                                <a href="{{url('admin/testemonials/accept', $testemonial)}}" class="btn btn-outline-success btn-sm px-3"><i class="ni ni-check-bold"></i></a>
                                                <a href="{{url('admin/testemonials/decline', $testemonial)}}" class="btn btn-outline-danger btn-sm px-3"><i class="ni ni-fat-remove"></i></a>
                                                @elseif ($testemonial->is_accepted)
                                                <span class="badge bg-success">Accepted</span>
                                                @else
                                                <span class="badge bg-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{-- <a href="{{url('/admin/testemonials', $testemonial)}}" class="btn btn-warning btn-sm">Edit</a> --}}
                                                <form action="{{ route('admin.testemonials.destroy', $testemonial->id) }}"
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
                                {{ $testemonials->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
