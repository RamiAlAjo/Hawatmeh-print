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
                            <div class="form-group">
                                <label for="image">Upload Image <small>(recommended size e.g. 1492x400)</small></label>
                                <input type="file" class="form-control" name="image" id="image">
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
