@extends('admin.layout.mainlayout')

@section('content')
<div class="container-fluid py-4">
    <!-- Display Validation Errors -->

    <div class="row">
        <!-- Left Side: Main Form -->
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Project</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form id="productForm" action="{{ route('admin.projects.update', ['id' => $work->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Product Information Section -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Edit Project</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category}}" @selected($category == old('category', $work))>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div id="category_error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$work->title}}" required>
                                <div id="title_error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{$work->description}}</textarea>
                                <div id="description_error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <div id="image_path_error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <img src="{{isset($work->image_path) ? asset('storage/' . $work->image_path) : url('/images/default.jpg')}}" id="currentImage" alt="Main Image" class="img-thumbnail" style="width: 100px;">
                            </div>
                        </div>

                        <!-- Product Images Section -->
                        <section class="mb-4">
                            <h5 class="mb-3">Other Images</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="images" class="form-label">Upload Images</label>
                                    <div id="imageDropzone" class="dropzone"></div>
                                    <span id="imageError" class="text-danger small" style="display:none;">Please upload at least one image</span>
                                </div>
                            </div>
                            @isset($work->images)
                            <div class="mb-3 d-flex">
                                @foreach ($work->images as $image)
                                <div class="d-flex flex-column w-sm-20">
                                    <img src="{{isset($image->image) ? asset('storage/' . $image->image) : url('/images/default.jpg')}}" id="currentImage" alt="Detail Image" class="img-thumbnail m-auto" style="width: 100px;">
                                    <input type="hidden" name="images_id[]" value="{{$image->id}}">
                                    <button type="button" onclick="this.closest('div').remove()" class="btn btn-outline-danger btn-xs m-auto w-50">remove</button>
                                </div>
                                @endforeach
                            </div>
                            @endisset
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


    </div>
</div>

<script src="{{url("assets/js/custom.js")}}"></script>


@endsection