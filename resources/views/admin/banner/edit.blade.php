@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <ul class="nav nav-tabs mb-3" id="banner-tab" role="tablist">
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

                            <div class="tab-content" id="banner-tab-content">
                                <!-- English Tab -->
                                <div class="tab-pane fade show active" id="tab-content-en" role="tabpanel" aria-labelledby="tab-en">
                                    <div class="form-group">
                                        <label class="form-label" for="title_en">Banner Title (EN)</label>
                                        <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter banner title" value="{{ $banner->title_en }}">
                                    </div>
                                </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="tab-content-ar" role="tabpanel" aria-labelledby="tab-ar">
                                    <div class="text-right" dir="rtl">
                                        <div class="form-group">
                                            <label class="form-label" for="title_ar">عنوان البانر</label>
                                            <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="أدخل عنوان البانر" value="{{ $banner->title_ar }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Tab -->
                                <div class="tab-pane fade" id="tab-content-image" role="tabpanel" aria-labelledby="tab-image">
                                    <div class="form-group">
                                        <label for="image">Upload New Image</label>
                                        <input id="image" type="file" class="form-control" name="image">
                                        @if ($banner->image)
                                            <img src="{{ asset($banner->image) }}" class="img-thumbnail mt-2" width="250px" height="150px" alt="Banner Image">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark">Update</button>
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
