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
                        <h6 class="text-white text-capitalize ps-3">Edit Latest</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form id="productForm" action="{{ route('admin.testemonials.update', ['id' => $testemonial->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Product Information Section -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Edit Testemonial</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$testemonial->name}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position" value="{{$testemonial->position}}">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <textarea class="form-control" id="body" name="body"
                                    rows="3" required>{{$testemonial->body}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <img src="{{isset($testemonial->image) ? asset('storage/' . $testemonial->image) : url('/images/default.jpg')}}"
                                    id="currentImage" alt="Main Image" class="img-thumbnail" style="width: 100px;">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="submitBtn" class="btn btn-primary mb-2">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<script src="{{url("assets/js/custom.js")}}"></script>


@endsection