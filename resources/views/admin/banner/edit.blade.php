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
                                <!-- Image Tab (Only keep this tab for image handling) -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-image" data-toggle="pill" href="#tab-content-image"
                                       role="tab" aria-controls="tab-content-image" aria-selected="true">Image</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="banner-tab-content">
                                <!-- Image Tab -->
                                <div class="tab-pane fade show active" id="tab-content-image" role="tabpanel" aria-labelledby="tab-image">
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
