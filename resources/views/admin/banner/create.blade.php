@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2">Add Banner</h5>
                        <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs mb-3" id="banner-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-en" data-toggle="pill" href="#tab-content-en"
                                        role="tab" aria-controls="tab-content-en" aria-selected="true">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-ar" data-toggle="pill" href="#tab-content-ar"
                                        role="tab" aria-controls="tab-content-ar" aria-selected="false">Arabic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-image" data-toggle="pill" href="#tab-content-image"
                                        role="tab" aria-controls="tab-content-image" aria-selected="false">Image</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="banner-tabs-content">
                                <!-- English Tab -->
                                <div class="tab-pane fade show active" id="tab-content-en" role="tabpanel" aria-labelledby="tab-en">
                                    <div class="form-group">
                                        <label for="title_en" class="form-label">Banner Title (EN)</label>
                                        <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter banner title in English">
                                    </div>
                                </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="tab-content-ar" role="tabpanel" aria-labelledby="tab-ar">
                                    <div class="text-right" dir="rtl">
                                        <div class="form-group">
                                            <label for="title_ar" class="form-label">عنوان البانر</label>
                                            <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="أدخل عنوان البانر">
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Tab -->
                                <div class="tab-pane fade" id="tab-content-image" role="tabpanel" aria-labelledby="tab-image">
                                    <div class="form-group">
                                        <label for="image">Upload Image <small>(recommended size e.g. 1492x400)</small></label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark">Create</button>
                                <a href="{{ route('admin.banner.index') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- col-md-12 -->
            </div> <!-- row -->
        </div> <!-- card -->
    </div> <!-- col-xl-12 -->
</div> <!-- row -->
@endsection
