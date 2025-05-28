@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2 text-dark font-weight-bold">Create Product</h5>
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-english-tab" data-toggle="pill" href="#nav-tabs-english" role="tab" aria-controls="nav-tabs-english" aria-selected="true">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="nav-arabic-tab" data-toggle="pill" href="#nav-arabic" role="tab" aria-controls="nav-arabic" aria-selected="false">Arabic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="nav-images-tab" data-toggle="pill" href="#nav-images" role="tab" aria-controls="nav-images" aria-selected="false">Images</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <!-- English Tab -->
                                <div class="tab-pane fade show active" id="nav-tabs-english" role="tabpanel" aria-labelledby="pills-english-tab">
                                    <div class="form-group">
                                        <label for="title_en" class="font-weight-semibold">Title (English)</label>
                                        <input type="text" class="form-control shadow-sm rounded" name="title_en" id="title_en" placeholder="Enter English Title" value="{{ old('title_en') }}">
                                        @error('title_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en" class="font-weight-semibold">Description (English)</label>
                                        <textarea class="form-control shadow-sm rounded" name="description_en" id="description_en" rows="4">{{ old('description_en') }}</textarea>
                                        @error('description_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Features -->
                                    <div class="form-group">
                                        <label for="features_en" class="font-weight-semibold">Features (English)</label>
                                        <div id="features_en">
                                            <div class="feature-input mb-3">
                                                <input type="text" class="form-control shadow-sm rounded" name="features_en[]" placeholder="Enter Feature">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow-sm" id="add-feature">Add Feature</button>
                                        @error('features_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Benefits -->
                                    <div class="form-group">
                                        <label for="benefits_en" class="font-weight-semibold">Benefits (English)</label>
                                        <div id="benefits_en">
                                            <div class="benefit-input mb-3">
                                                <input type="text" class="form-control shadow-sm rounded" name="benefits_en[]" placeholder="Enter Benefit">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow-sm" id="add-benefit">Add Benefit</button>
                                        @error('benefits_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="nav-arabic" role="tabpanel" aria-labelledby="nav-arabic-tab">
                                    <div class="text-right" dir="rtl">
                                        <div class="form-group">
                                            <label for="title_ar" class="font-weight-semibold">العنوان (Arabic)</label>
                                            <input type="text" class="form-control shadow-sm rounded" name="title_ar" id="title_ar" placeholder="العنوان" value="{{ old('title_ar') }}">
                                            @error('title_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description_ar" class="font-weight-semibold">المواصفات (Arabic)</label>
                                            <textarea class="form-control shadow-sm rounded" name="description_ar" id="description_ar" rows="4">{{ old('description_ar') }}</textarea>
                                            @error('description_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Arabic Features -->
                                        <div class="form-group">
                                            <label for="features_ar" class="font-weight-semibold">المميزات (Arabic)</label>
                                            <div id="features_ar">
                                                <div class="feature-input mb-3">
                                                    <input type="text" class="form-control shadow-sm rounded" name="features_ar[]" placeholder="أدخل المميزات">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill shadow-sm" id="add-feature-ar">أضف ميزة</button>
                                            @error('features_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Arabic Benefits -->
                                        <div class="form-group">
                                            <label for="benefits_ar" class="font-weight-semibold">الفوائد (Arabic)</label>
                                            <div id="benefits_ar">
                                                <div class="benefit-input mb-3">
                                                    <input type="text" class="form-control shadow-sm rounded" name="benefits_ar[]" placeholder="أدخل الفوائد">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill shadow-sm" id="add-benefit-ar">أضف فائدة</button>
                                            @error('benefits_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Images Tab -->
                                <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                                    <div class="form-group">
                                        <label for="image" class="font-weight-semibold">Single Image</label>
                                        <input id="image" type="file" class="form-control shadow-sm rounded" name="image" onchange="previewImage(this)">
                                        @error('image')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="image-preview" class="mb-3"></div>

                                    <div class="form-group">
                                        <label for="images" class="font-weight-semibold">Multiple Images</label>
                                        <input id="images" type="file" class="form-control shadow-sm rounded" name="images[]" multiple onchange="previewImages(this)">
                                        @error('images')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="images-preview" class="d-flex flex-wrap"></div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark rounded-pill shadow-sm">Create</button>
                                <button type="button" class="btn btn-light rounded-pill shadow-sm" onclick="window.location='{{ route('admin.products.index') }}'">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add more Features (English)
    document.getElementById('add-feature').addEventListener('click', function(){
        var featureInput = document.createElement('div');
        featureInput.classList.add('feature-input', 'mb-2');
        featureInput.innerHTML = '<input type="text" class="form-control shadow-sm rounded" name="features_en[]" placeholder="Enter Feature"><button type="button" class="btn btn-danger btn-sm rounded-pill mt-2" onclick="removeFeature(this)">Remove</button>';
        document.getElementById('features_en').appendChild(featureInput);
    });

    // Add more Benefits (English)
    document.getElementById('add-benefit').addEventListener('click', function(){
        var benefitInput = document.createElement('div');
        benefitInput.classList.add('benefit-input', 'mb-2');
        benefitInput.innerHTML = '<input type="text" class="form-control shadow-sm rounded" name="benefits_en[]" placeholder="Enter Benefit"><button type="button" class="btn btn-danger btn-sm rounded-pill mt-2" onclick="removeBenefit(this)">Remove</button>';
        document.getElementById('benefits_en').appendChild(benefitInput);
    });

    // Add more Features (Arabic)
    document.getElementById('add-feature-ar').addEventListener('click', function(){
        var featureInput = document.createElement('div');
        featureInput.classList.add('feature-input', 'mb-2');
        featureInput.innerHTML = '<input type="text" class="form-control shadow-sm rounded" name="features_ar[]" placeholder="أدخل المميزات"><button type="button" class="btn btn-danger btn-sm rounded-pill mt-2" onclick="removeFeature(this)">Remove</button>';
        document.getElementById('features_ar').appendChild(featureInput);
    });

    // Add more Benefits (Arabic)
    document.getElementById('add-benefit-ar').addEventListener('click', function(){
        var benefitInput = document.createElement('div');
        benefitInput.classList.add('benefit-input', 'mb-2');
        benefitInput.innerHTML = '<input type="text" class="form-control shadow-sm rounded" name="benefits_ar[]" placeholder="أدخل الفوائد"><button type="button" class="btn btn-danger btn-sm rounded-pill mt-2" onclick="removeBenefit(this)">Remove</button>';
        document.getElementById('benefits_ar').appendChild(benefitInput);
    });

    // Remove Feature or Benefit dynamically
    function removeFeature(button) {
        button.closest('.feature-input').remove();
    }

    function removeBenefit(button) {
        button.closest('.benefit-input').remove();
    }

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

    // Preview multiple images for multiple image uploads
    function previewImages(input) {
        const previewContainer = document.getElementById('images-preview');
        previewContainer.innerHTML = '';

        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'rounded', 'shadow-sm');
                img.style.marginRight = '10px';
                img.style.marginBottom = '10px';
                img.width = 100;
                img.height = 100;
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
</script>

@endsection
