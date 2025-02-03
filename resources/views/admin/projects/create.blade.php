@extends('admin.layout.mainlayout')

@section('content')
<div class="container-fluid py-4">
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Left Side: Main Form -->
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Project</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form id="productForm" action="{{ route('admin.projects.store') }}" method="POST">
                        @csrf
                        <!-- Product Information Section -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Add Project</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->value}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div id="category_error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                                <div id="title_error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                <div id="description_error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                <div id="image_path_error" class="text-danger"></div>
                            </div>
                        </div>

                        <!-- Product Images Section -->
                        <section class="mb-4">
                            <h5 class="mb-3">Other Images</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="images" class="form-label">Upload Images</label>
                                    <div id="imageDropzone" class="dropzone"></div>
                                    <span id="imageError" class="text-danger small" style="display:none;">Please upload
                                        at least one image</span>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
            <div class="card my-4">
                <div class="card-body">
                    <button type="button" id="submitBtn" class="btn btn-primary mb-2">Submit</button>
                </div>
            </div>
        </div>
        <!-- Right Side: Options -->



        <!-- Options -->

    </div>
</div>

<script src="{{url("assets/js/custom.js")}}"></script>

@endsection