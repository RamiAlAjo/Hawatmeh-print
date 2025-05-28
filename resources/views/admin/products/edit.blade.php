@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4 shadow-sm border-light">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2 mb-4">Edit Product</h5>
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <ul class="nav nav-tabs mb-4" id="pills-tab" role="tablist">
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
                                        <label for="title_en" class="font-weight-bold">Title (English)</label>
                                        <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter English Title" value="{{ old('title_en', $product->title_en) }}">
                                        @error('title_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en" class="font-weight-bold">Description (English)</label>
                                        <textarea class="form-control" name="description_en" id="description_en" rows="4">{{ old('description_en', $product->description_en) }}</textarea>
                                        @error('description_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- English Features -->
                                    <div class="form-group">
                                        <label for="features_en" class="font-weight-bold">Features (English)</label>
                                        <div id="features_en">
                                            @foreach(json_decode($product->features_en, true) as $feature)
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="features_en[]" value="{{ old('features_en[]', $feature) }}" placeholder="Enter Feature">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger btn-sm remove-feature" data-toggle="tooltip" data-placement="top" title="Remove Feature"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-outline-primary mb-3" id="add-feature" data-toggle="tooltip" data-placement="top" title="Add Feature"><i class="fa fa-plus-circle"></i> Add Feature</button>
                                        @error('features_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Benefits -->
                                    <div class="form-group">
                                        <label for="benefits_en" class="font-weight-bold">Benefits (English)</label>
                                        <div id="benefits_en">
                                            @foreach(json_decode($product->benefits_en, true) as $benefit)
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="benefits_en[]" value="{{ old('benefits_en[]', $benefit) }}" placeholder="Enter Benefit">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-danger btn-sm remove-benefit" data-toggle="tooltip" data-placement="top" title="Remove Benefit"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-outline-primary mb-3" id="add-benefit" data-toggle="tooltip" data-placement="top" title="Add Benefit"><i class="fa fa-plus-circle"></i> Add Benefit</button>
                                        @error('benefits_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="nav-arabic" role="tabpanel" aria-labelledby="nav-arabic-tab">
                                    <div class="text-right" dir="rtl">
                                        <div class="form-group">
                                            <label for="title_ar" class="font-weight-bold">العنوان (Arabic)</label>
                                            <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="العنوان" value="{{ old('title_ar', $product->title_ar) }}">
                                            @error('title_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description_ar" class="font-weight-bold">المواصفات (Arabic)</label>
                                            <textarea class="form-control" name="description_ar" id="description_ar" rows="4">{{ old('description_ar', $product->description_ar) }}</textarea>
                                            @error('description_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Arabic Features -->
                                        <div class="form-group">
                                            <label for="features_ar" class="font-weight-bold">المميزات (Arabic)</label>
                                            <div id="features_ar">
                                                @foreach(json_decode($product->features_ar, true) as $feature)
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" name="features_ar[]" value="{{ old('features_ar[]', $feature) }}" placeholder="أدخل المميزات">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger btn-sm remove-feature-ar" data-toggle="tooltip" data-placement="top" title="Remove Feature"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-outline-primary mb-3" id="add-feature-ar" data-toggle="tooltip" data-placement="top" title="أضف ميزة"><i class="fa fa-plus-circle"></i> أضف ميزة</button>
                                            @error('features_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Arabic Benefits -->
                                        <div class="form-group">
                                            <label for="benefits_ar" class="font-weight-bold">الفوائد (Arabic)</label>
                                            <div id="benefits_ar">
                                                @foreach(json_decode($product->benefits_ar, true) as $benefit)
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" name="benefits_ar[]" value="{{ old('benefits_ar[]', $benefit) }}" placeholder="أدخل الفوائد">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger btn-sm remove-benefit-ar" data-toggle="tooltip" data-placement="top" title="Remove Benefit"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-outline-primary mb-3" id="add-benefit-ar" data-toggle="tooltip" data-placement="top" title="أضف فائدة"><i class="fa fa-plus-circle"></i> أضف فائدة</button>
                                            @error('benefits_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Images Tab -->
                                <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                                    <div class="form-group">
                                        <label for="image" class="font-weight-bold">Single Image</label>
                                        <input id="image" type="file" class="form-control" name="image">
                                        @if($product->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $product->image) }}" width="100" height="100" alt="Current image">
                                            </div>
                                        @endif
                                        @error('image')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="images" class="font-weight-bold">Multiple Images</label>
                                        <input id="images" type="file" class="form-control" name="images[]" multiple>
                                        @if($product->images)
                                            <div class="mt-2">
                                                @foreach(json_decode($product->images) as $image)
                                                    <img src="{{ asset('storage/' . $image) }}" width="100" height="100" alt="Product Image">
                                                @endforeach
                                            </div>
                                        @endif
                                        @error('images')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark btn-lg">Update</button>
                                <button type="button" class="btn btn-light btn-lg" onclick="window.location='{{ route('admin.products.index') }}'">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add Feature/Benefit dynamically
    function addFeatureOrBenefit(sectionId, inputName, placeholder, addButtonId, removeButtonClass) {
        document.getElementById(addButtonId).addEventListener('click', function(){
            var newInputGroup = document.createElement('div');
            newInputGroup.classList.add('input-group', 'mb-2');
            newInputGroup.innerHTML = '<input type="text" class="form-control" name="'+ inputName + '[]" placeholder="'+ placeholder + '">' +
                                      '<div class="input-group-append">' +
                                          '<button type="button" class="btn btn-danger btn-sm '+ removeButtonClass + '" data-toggle="tooltip" data-placement="top" title="Remove ' + placeholder + '">' +
                                              '<i class="fa fa-trash"></i>' +
                                          '</button>' +
                                      '</div>';
            document.getElementById(sectionId).appendChild(newInputGroup);
        });
    }

    // Remove Feature/Benefit dynamically
    function removeFeatureOrBenefit(sectionId, removeButtonClass) {
        document.getElementById(sectionId).addEventListener('click', function(event){
            if (event.target.classList.contains(removeButtonClass)) {
                event.target.closest('.input-group').remove();
            }
        });
    }

    addFeatureOrBenefit('features_en', 'features_en', 'Enter Feature', 'add-feature', 'remove-feature');
    removeFeatureOrBenefit('features_en', 'remove-feature');

    addFeatureOrBenefit('benefits_en', 'benefits_en', 'Enter Benefit', 'add-benefit', 'remove-benefit');
    removeFeatureOrBenefit('benefits_en', 'remove-benefit');

    addFeatureOrBenefit('features_ar', 'features_ar', 'أدخل المميزات', 'add-feature-ar', 'remove-feature-ar');
    removeFeatureOrBenefit('features_ar', 'remove-feature-ar');

    addFeatureOrBenefit('benefits_ar', 'benefits_ar', 'أدخل الفوائد', 'add-benefit-ar', 'remove-benefit-ar');
    removeFeatureOrBenefit('benefits_ar', 'remove-benefit-ar');
</script>

@endsection
