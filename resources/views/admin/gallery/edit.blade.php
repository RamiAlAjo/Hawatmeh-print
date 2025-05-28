@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2 text-dark font-weight-bold">Edit Gallery</h5>

                        <!-- Displaying success or error messages -->
                        @if(session('status-success'))
                            <div class="alert alert-success">
                                {{ session('status-success') }}
                            </div>
                        @endif

                        @if(session('status-error'))
                            <div class="alert alert-danger">
                                {{ session('status-error') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-english-tab" data-toggle="pill" href="#nav-tabs-english" role="tab" aria-controls="nav-tabs-english" aria-selected="true">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="nav-arabic-tab" data-toggle="pill" href="#nav-arabic" role="tab" aria-controls="nav-arabic" aria-selected="false">Arabic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="nav-images-tab" data-toggle="pill" href="#nav-images" role="tab" aria-controls="nav-images" aria-selected="false">Image</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <!-- English Tab -->
                                <div class="tab-pane fade show active" id="nav-tabs-english" role="tabpanel" aria-labelledby="pills-english-tab">
                                    <div class="form-group">
                                        <label for="gallery_title_en" class="font-weight-semibold">Title (English)</label>
                                        <input type="text" class="form-control shadow-sm rounded" name="gallery_title_en" id="gallery_title_en" placeholder="Enter English Title" value="{{ old('gallery_title_en', $gallery->gallery_title_en) }}">
                                        @error('gallery_title_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="nav-arabic" role="tabpanel" aria-labelledby="nav-arabic-tab">
                                    <div class="text-right" dir="rtl">
                                        <div class="form-group">
                                            <label for="gallery_title_ar" class="font-weight-semibold">العنوان (Arabic)</label>
                                            <input type="text" class="form-control shadow-sm rounded" name="gallery_title_ar" id="gallery_title_ar" placeholder="أدخل العنوان" value="{{ old('gallery_title_ar', $gallery->gallery_title_ar) }}">
                                            @error('gallery_title_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Tab -->
                                <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                                    <div class="form-group">
                                        <label for="gallery_image" class="font-weight-semibold">Gallery Image</label>
                                        <input id="gallery_image" type="file" class="form-control shadow-sm rounded" name="gallery_image" onchange="previewImage(this)">
                                        @error('gallery_image')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if($gallery->gallery_image)
                                        <div id="image-preview" class="mb-3">
                                            <img src="{{ asset('storage/' . $gallery->gallery_image) }}" class="img-thumbnail" width="150" height="150">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark rounded-pill shadow-sm">Update</button>
                                <button type="button" class="btn btn-light rounded-pill shadow-sm" onclick="window.location='{{ route('admin.gallery.index') }}'">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview image for single image upload
    function previewImage(input) {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail rounded shadow-sm" width="150" height="150">`;
        };
        reader.readAsDataURL(file);
    }
</script>

@endsection
